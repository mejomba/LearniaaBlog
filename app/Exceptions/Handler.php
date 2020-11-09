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
  protected $dontReport = [ ];
  protected $dontFlash = ['password','password_confirmation',];
  
  public function report(Exception $exception){ parent::report($exception); }
  
  public function render($request, Exception $exception)
    {
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
            $time = Carbon::now('IRAN')->format('g:i A');
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
            $newerror->error_file =$exception->getfile();
            $newerror->error_line =$exception->getline();
            $newerror->logname = 'laravel-'.$date.'.log';
            $newerror->save();
            if (env('APP_URL') !== 'http://localhost')
            {
           if( $statusCode == '500' || $statusCode == '404')  
            { 
                return redirect()->back()->with('report',' خطا : مشکل درعملیات پایگاه داده');
            }
            }
        }
        return parent::render($request, $exception);
    }
}
