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
use App\Mail\SendMail;


class ResetPasswordController extends Controller
{
  
    public function index()
    {
       return view('auth.passwords.reset');
    }

    public function store(Request $request)
    {
        $validator =  $this->validation($request);

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
                        $reset_new = new Reset();
                        $reset_new->pk_user = $user['pk_users'] ;
                        $pk_user = $user['pk_users'] ;
                        $reset_new->token = $Random_Generate;
                        $reset_new->save();
                    
                        // Send data
                        $check = substr(request()->username,'0','2');
                        if($check!=='09')
                        { 
                            $Random_Generate = rand(0,999999);
                            $username = User::select('username')->where('username',request()->username)->first();
                            if($username->username)
                            {
                            $details = [
                                'title' => 'کد تایید فراموشی رمز   | لرنیا',
                                'body' => $Random_Generate
                            ];
                              /*
                                $type ='Resetpassword';
                               $address = 'www.'.$username->username;
                            \Mail::to($address)->send(new SendMail($details,$type));  */
                            $email = new \SendGrid\Mail\Mail(); 
                            $email->setFrom("support@learniaa.com", "Support");
                            $email->setSubject("Sending with SendGrid is Fun");
                            $email->addTo("maxmoler1376@gmail.com.com", "maxmoler1376");
                            $email->addContent("text/plain", "and easy to do anywhere, even with PHP");
                            $email->addContent(
                                "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
                            );
                            $sendgrid = new \SendGrid('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');
                            try {
                                $response = $sendgrid->send($email);
                                print $response->statusCode() . "\n";
                                print_r($response->headers());
                                print $response->body() . "\n";
                            } catch (Exception $e) {
                                echo 'Caught exception: '. $e->getMessage() ."\n";
                            }


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


            $validator =  $this->check_token($request,$reset->token);

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

    public function validation(Request $request)
    {

        $rules =  [
            
                     'username' => ['required',new validate]
                 ];

            $messages = [                      
                            'username.required' => 'نام کاربری وارد نشده است',
                            'username.validate' => ' نام کاربری صحیح وارد نشده است',
                            'useranme.exists' => ' شماره تلفن همراه شما ثبت نام نشده است ',    
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




  

}
