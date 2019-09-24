<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Classes\PayamakSefid\SendSms;
use App\Reset;
use App\User;
use App\Rules\CustomValue;
use Hash;

class ResetPasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Auth.passwords.reset');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
                date_default_timezone_set("Asia/Tehran");
                $APIKey = '9e748ce762b7c17478c4b783';
                $SecretKey = 'H$c7M~Ax#Z@7Y%3';

                $Random_Generate = rand(0,9999);

                $user = User::where('mobile',request()->mobile)->first();


                $reset_new = new Reset();
                $reset_new->pk_user = $user['pk_users'] ;
                $pk_user = $user['pk_users'] ;
                $reset_new->token = $Random_Generate;
                $reset_new->save();
            
                // Send data
                $SendData = array(
                    'Message' =>  $Random_Generate ,
                    'MobileNumbers' => array(request()->mobile)  ,
                    'CanContinueInCaseOfError' => true
                );
            
                $PayamakSefid_SendByMobileNumbers = new SendSms($APIKey,$SecretKey);
               
                if( $SendByMobileNumbers = $PayamakSefid_SendByMobileNumbers->SendByMobileNumbers($SendData))
                {    
                       
                        return redirect(route('reset.show',compact('pk_user')));
                }
                else
                {
                    return redirect()->back()->with('error','خطا : مشکل در');
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
        return view('Auth.passwords.verify',compact('pk_user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
                return view('Auth.passwords.newpassword',compact('pk_user'));
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
                    return redirect()->back()->with('error','خطا : مشکل در');
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
            
            'mobile' => 'required|numeric|min:3|exists:users'
         ];

    



            $messages = [

           
            'mobile.required' => 'شماره تلفن همراه  وارد نشده است',
            'mobile.min' => ' شماره تلفن همراه  کوتاه تر از حد مجاز است',
            'mobile.numeric' => ' شماره تلفن همراه صحیح وارد نشده است ',
            'mobile.exists' => ' شماره تلفن همراه شما ثبت نام نشده است ',    
          
                    ];

        $validator = Validator::make($request->all(),$rules,$messages);

        return $validator ;
    }

  

}
