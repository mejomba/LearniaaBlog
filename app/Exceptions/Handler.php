<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Log; 
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Auth;
use Carbon\Carbon;
use App\Errors;


class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
       // dd($exception);
        if ($exception instanceof \Exception) 
        {
            Log::error($exception->getMessage());
            if (method_exists($exception, 'getStatusCode')) {
                $statusCode = $exception->getStatusCode();
            } else {
                $statusCode = 500;
            }
            $user =  Auth::user();
            $date = Carbon::now('IRAN')->format('y-m-d');
            $time = Carbon::now('IRAN')->format('h:i:s');
            if($user != null)
            {
                $pkuser=$user->pk_users;

            }
            else
            {
                $pkuser='guest';
            }
            $message = $exception->getMessage();
            if($statusCode == '404')
            {
                $message = 'page not found';
            }
            $newerror = new Errors();
            $newerror->user = $pkuser;
            $newerror->date = $date;
            $newerror->time = $time;
            $newerror->error_code = $statusCode;
            $newerror->error_message = $message;
            $newerror->logname = 'laravel-'.$date.'.log';
            $newerror->save();
           if( $statusCode == '404')  
            { 
               
                return redirect()->back()->withErrors('خطایی رخ داده است با پشتیبانی در ارتباط باشید .');
            }
        }
       
        
        return parent::render($request, $exception);
    }
}
