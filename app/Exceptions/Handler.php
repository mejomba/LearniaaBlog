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
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Exceptions\customException;
use Verta;

class Handler extends ExceptionHandler
{
  protected $dontReport = [ ];
  protected $dontFlash = ['password','password_confirmation',];
  
  public function report(Exception $exception)
  { 
       

      parent::report($exception);
  }
  
  public function render($request, Exception $exception)
    {
            if ($exception instanceof \Exception) 
            {
                Log::error($exception->getMessage());
                if (method_exists($exception, 'getStatusCode')) 
                {
                    $statusCode = $exception->getStatusCode();
                }
                else
                {
                    $statusCode = 500;
                }
                $user =  Auth::user();
                $date = new Verta();
                $date->timezone = 'Asia/Tehran';
                $time = Carbon::now('IRAN')->format('g:i A');
                $carbondate = Carbon::now()->format('Y-m-d');
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
                    //throw new customException;
                    $message = 'page not found';
                }
                $newerror = new Errors();
                $newerror->user = $pkuser;
                $newerror->date = $date->format('y-m-d');
                $newerror->time = $time;
                $newerror->error_code = $statusCode;
                $newerror->error_message = $message;
                $newerror->error_file= $exception->getfile();
                $newerror->error_line =$exception->getline();
                $newerror->logname = 'laravel-'.$carbondate.'.log';
                $newerror->save();

                // Send Bot Log //
                /*$client = new \GuzzleHttp\Client();
                /* Send Bot Log 
                $client = new \GuzzleHttp\Client();
                $response = $client->request('POST', 'https://lrnia.ir/SendNotificationErrorWebsite', [
                    'form_params' => [
                                    'user' =>$pkuser ,
                                    'date' =>$date ,
                                    'time' =>$time ,
                                    'error_code' =>$statusCode ,
                                    'error_message' =>$message ,
                                    'error_file' =>$exception->getfile() ,
                                    'error_line' =>$exception->getfile() ,
                                    'filename' => 'laravel-'.$date.'.log' ,

                                    ]]);
                $response = $response->getBody()->getContents();
                // Send Bot Log //
*/
                //Log::error(['error message'=>$message,'error code'=>$statusCode]);
                


                if (env('APP_ENV') !== 'local')
                {
                    return redirect()->back()->with('report',' خطا : مشکلی پیش آمده است با پشتیبان سایت در چت آنلاین گفتگو کنید');
                }
        }
        
        return parent::render($request, $exception);
    }
}
