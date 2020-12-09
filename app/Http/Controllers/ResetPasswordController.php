<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Reset;
use App\User;
use App\Rules\CustomValue;
use App\Transaction;
use Hash;
use SoapClient;
use App\Rules\validate;
use Mailgun\Mailgun;
use App\Rules\registercode;

class ResetPasswordController extends Controller
{
  
    public function index()
    {
       return view('auth.passwords.reset');
    }

    public function store(Request $request)
    {
        $validator =  $this->validationReset($request);

        if ($validator->fails())
           {
                return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
          }
    
        else
          {     

                        $Random_Generate = rand(0,9999);
                        $user = User::where('username',request()->username)->first();
                        if($user)
                        {
                            $reset_new = new Reset();
                            $reset_new->pk_user = $user['pk_users'] ;
                            $pk_user = $user['pk_users'] ;
                            $reset_new->token = $Random_Generate;
                            $reset_new->save();
                            // Send data
                            $check = substr(request()->username,'0','2');

                            if($check!=='09')
                            { 
                                $username = User::select('username')->where('username',request()->username)->first();
                                if($username->username)
                                {
                                    
                                    $phpMailer = new  \PHPMailer\PHPMailer\PHPMailer(true);
                                    $phpMailer->isSMTP();
                                    $phpMailer->Host = "smtp.iran.liara.ir";
                                    $phpMailer->SMTPAuth = true;
                                    $phpMailer->Username = "learniaa";
                                    $phpMailer->Password = "b7459b74-ac35-46df-9a22-1fa240dbdc02";
                                    $phpMailer->SMTPSecure = "tls";
                                    $phpMailer->Port = 587;
                                    $phpMailer->isHTML(true);
                                    $phpMailer->CharSet = "UTF-8";
                                    $phpMailer->setFrom("info@learniaa.com", "'کد تایید | لرنیا'");
                                    $phpMailer->addAddress($username->username);
                                    $phpMailer->Subject = "'کد تایید | لرنیا'";
                                    $phpMailer->Body = "کد تایید : $Random_Generate";
                                    $phpMailer->send();

                                    /*
                                    $phpMailer = new  \PHPMailer\PHPMailer\PHPMailer(true);
                                    $phpMailer->isSMTP();
                                    $phpMailer->Host = "smtp.zoho.com";
                                    $phpMailer->SMTPAuth = true;
                                    $phpMailer->Username = "info@learniaa.com";
                                    $phpMailer->Password = "Mohammad1376";
                                    $phpMailer->SMTPSecure = "tls";
                                    $phpMailer->Port = 587;
                                    $phpMailer->isHTML(true);
                                    $phpMailer->CharSet = "UTF-8";
                                    $phpMailer->setFrom("info@learniaa.com", "'کد تایید | لرنیا'");
                                    $phpMailer->addAddress($username->username);
                                    $phpMailer->Subject = "'کد تایید | لرنیا'";
                                    $phpMailer->Body = "کد تایید : $Random_Generate";
                                    $phpMailer->send();
                                    */
     
    
                                }
                                return redirect(route('reset.show',compact('pk_user')));                                    
                            }
                            else
                            {
                                $client = new \IPPanel\Client('ai8RCfgBRB4EMq_WdlVq36Pw7DbmqyBQQRMsYBxh8wc=');
                                $client->send(
                                    "+9850009589",          // originator
                                    [request()->username],    // recipients
                                   "لرنیا - کد شما برابر با  $Random_Generate"// message
                                );           
                                return redirect(route('reset.show',compact('pk_user')));
                            }
                        }
                        else
                        {
                            return redirect()->back()->with('report',' چنین نام کاربری وجود ندارد');
                        }
                      
                       
            
         }

    }

    public function registercode(Request $request)
    {
        return view('auth.registerconfirm');

    }

    public function registerconfirm(Request $request)
    {
        $validator =  $this->validation($request);
        $confirm = '';
        
        if ($validator->fails())
           {
                return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
          }else
          {  
                if(request()->picid == 1 && request()->confirm == 76432)
                {
                    $confirm = 'OK';
                }elseif(request()->picid== 2 && request()->confirm == 14481)
                {
                    $confirm = 'OK';
                }elseif(request()->picid== 3 && request()->confirm == 32077)
                {
                    $confirm = 'OK';
                }elseif(request()->picid== 4 && request()->confirm == 45179)
                {
                    $confirm = 'OK';
                }elseif(request()->picid== 5 && request()->confirm == 81024)
                {
                    $confirm = 'OK';
                }elseif(request()->picid== 6 && request()->confirm == 18990)
                {
                    $confirm = 'OK';
                }elseif(request()->picid== 7 && request()->confirm == 57186)
                {
                    $confirm = 'OK';
                }elseif(request()->picid== 8 && request()->confirm == 96212)
                {
                    $confirm = 'OK';
                }elseif(request()->picid== 9 && request()->confirm == 18173)
                {
                    $confirm = 'OK';
                }elseif(request()->picid== 10 && request()->confirm == 50329)
                {
                    $confirm = 'OK';
                }
                if($confirm == 'OK')
                {
                        $Random_Generate = rand(0,9999);
                        $check = substr($_GET['username'],'0','2');

                        if($check!=='09')
                        { 
                            $newcode = new reset();
                            $newcode->pk_user = $_GET['username'];
                            $newcode->token = $Random_Generate;
                            $newcode->save();


                            $phpMailer = new  \PHPMailer\PHPMailer\PHPMailer(true);
                            $phpMailer->IsSMTP();
                            $phpMailer->Host = "smtp.iran.liara.ir";
                            $phpMailer->SMTPAuth = true;
                            $phpMailer->Username = "learniaa";
                            $phpMailer->Password = "b7459b74-ac35-46df-9a22-1fa240dbdc02";
                            $phpMailer->SMTPSecure = "TLS";
                            $phpMailer->Port = 587;
                            $phpMailer->isHTML(true);
                            $phpMailer->CharSet = "UTF-8";
                            $phpMailer->setFrom("info@learniaa.com", "'کد تایید | لرنیا'");
                            $phpMailer->addAddress($_GET['username']);
                            $phpMailer->Subject = "'کد تایید | لرنیا'";
                            $phpMailer->Body = "کد تایید : $Random_Generate";
                            $phpMailer->MsgHTML("کد تایید : $Random_Generate");
                            $phpMailer->send();

                            /*
                               $phpMailer = new  \PHPMailer\PHPMailer\PHPMailer(true);
                               $phpMailer->IsSMTP();
                               $phpMailer->Host = "smtp.zoho.com";
                               $phpMailer->SMTPAuth = true;
                               $phpMailer->Username = "info@learniaa.com";
                               $phpMailer->Password = "Mohammad1376";
                               $phpMailer->SMTPSecure = "TLS";
                               $phpMailer->Port = 587;
                               $phpMailer->isHTML(true);
                               $phpMailer->CharSet = "UTF-8";
                               $phpMailer->setFrom("info@learniaa.com", "'کد تایید | لرنیا'");
                               $phpMailer->addAddress($_GET['username']);
                               $phpMailer->Subject = "'کد تایید | لرنیا'";
                               $phpMailer->Body = "کد تایید : $Random_Generate";
                               $phpMailer->MsgHTML("کد تایید : $Random_Generate");
                               $phpMailer->send();
                               */

                            return view('auth.registerconfirm',compact('Random_Generate'));
                        }
                        else
                        {
                            $newcode = new reset();
                            $newcode->pk_user = $_GET['username'];
                            $newcode->token = $Random_Generate;
                            $newcode->save();
                            
                            $client = new \IPPanel\Client('ai8RCfgBRB4EMq_WdlVq36Pw7DbmqyBQQRMsYBxh8wc=');
                            $client->send(
                                "+9850009589",          // originator
                                [$_GET['username']],    // recipients
                               "لرنیا - کد شما برابر با  $Random_Generate"// message
                            );           
                            return view('auth.registerconfirm',compact('Random_Generate'));
                        }

                    }
                    elseif($confirm=='')
                    {
                        return redirect()->back()->withErrors('کد تصویری صحیح وارد نشده است');
                    }
         }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pk_user = $id ;
        return view('auth.passwords.verify',compact('pk_user'));
    }

    public function update(Request $request,$id)
    {
           $pk_user = $id ;
            $reset = Reset::where('pk_user',$id)->orderBy('pk_reset', 'DESC')->first();


            $validator =  $this->token($request,$pk_user);

            if ($validator->fails())
               {
                    return redirect()->back()
                                ->withErrors($validator)
                                ->withInput();
              }
        
            else
              {  
                return view('auth.passwords.newpassword',compact('pk_user'));
              }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $validator =  $this->checkPassword($request);

        if ($validator->fails())
           {
                return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
          }
    
        else
          {  
            $user = User::find($id);
            $user->password = Hash::make(request()->newpassword)   ; 
         
                if($user->save())
                {
                        return redirect(route('index'))->with('success','کاربر با موفقیت ویرایش شد');
                }
                else
                {
                    return redirect()->back()->with('report',' خطا : مشکل درعملیات پایگاه داده');
                }
           }

    }

    public function check_token(Request $request,$token)
    {

        $rules =  [  'newpassword' => [ new CustomValue($token)]  ];
            
            $messages = [  ];

                   

        $validator = Validator::make($request->all(),$rules,$messages);

        return $validator ;
    }
    

    public function checkPassword(Request $request)
    {

        $rules =  [   'newpassword' => 'required|min:6'  , ];
            
            $messages = [  'newpassword.required' => 'رمز عبور وارد نشده است',
            'newpassword.min' => 'رمز عبور کوتاه تر از حد مجاز است', ];

                   

        $validator = Validator::make($request->all(),$rules,$messages);

        return $validator ;
    }


    public function validationReset(Request $request)
    {

        $rules =  [
                     'username' => ['required',new validate],
                 ];

            $messages = [                      
                            'username.required' => 'نام کاربری وارد نشده است',
                            'username.validate' => ' نام کاربری صحیح وارد نشده است',
                       ];

        $validator = Validator::make($request->all(),$rules,$messages);

        return $validator ;
    }

    public function validation(Request $request)
    {

        $rules =  [
            
                     'username' => ['required',new validate],
                     'name'=>'required|min:2',
                     'password'=>'required',
                     'confirm'=>'required'
                 ];

            $messages = [                      
                            'username.required' => 'نام کاربری وارد نشده است',
                            'username.validate' => ' نام کاربری صحیح وارد نشده است',
                            'useranme.exists' => ' شماره تلفن همراه شما ثبت نام نشده است ',
                            'name.required' => 'نام  وارد نشده است',
                            'name.validate' => ' نام  صحیح وارد نشده است',   
                            'password.required' => 'رمز عبور  وارد نشده است',
                            'confirm.required' => 'اعداد داخل کادر  وارد نشده است',

                       ];

        $validator = Validator::make($request->all(),$rules,$messages);

        return $validator ;
    }

    public function showcallbackloginform(Request $request)
    {
        $pk_package = "Null";
        if(request()->pk_package)
        {
            $pk_package = request()->pk_package ;
        }
        $redirectFromURL = url()->previous();
        return view('auth.callbacklogin',compact('redirectFromURL','pk_package'));
    }
    

    public function callbacklogin(Request $request)
    {
        $rules =  [ 'username' => ['required',new validate] ];
       $messages = ['username.required' => 'نام کاربری وارد نشده است',                      
                    'username.validate' => ' نام کاربری صحیح وارد نشده است', 
                   ];    
        $validator = Validator::make($request->all(),$rules,$messages);
        if ($validator->fails())
           {return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
          }
        else
          {   $user = User::where('username',request()->username)->first();
                $redirect = "/academy";
                $pk_package = "Null";
                if(isset(request()->pk_package)) {$pk_package = request()->pk_package ; }
                if(request()->redirectFromURL != null )
                {
                  $redirect = request()->redirectFromURL;
                }

                if($user == null)
                {
                    return redirect(route('register',[
                        'username' =>request()->username ,
                        'redirectFromURL' => $redirect ,
                        'pk_package' => $pk_package
                       
                    ]));    
                }
                else
                {
                    return redirect(route('login',[
                        'username' =>request()->username ,
                        'redirectFromURL' => $redirect ,
                        'pk_package' => $pk_package
                    ]));    
                }
         }

    }
    public function token(Request $request,$pk_user)
{
    $rules =  [  'username' => [ new registercode($pk_user)]  ];
            
    $messages = [  ];

           

$validator = Validator::make($request->all(),$rules,$messages);

return $validator ;

}
  

}
