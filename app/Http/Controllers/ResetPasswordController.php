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

class ResetPasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('auth.passwords.reset');
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
                $Random_Generate = rand(0,9999);
                $user = User::where('mobile',request()->mobile)->first();
                $reset_new = new Reset();
                $reset_new->pk_user = $user['pk_users'] ;
                $pk_user = $user['pk_users'] ;
                $reset_new->token = $Random_Generate;
                $reset_new->save();
            
                // Send data
                $url = "https://ippanel.com/services.jspd";
                $rcpt_nm = array(request()->mobile);
                $param = array
                            (
                                'uname'=>'09901918193',
                                'pass'=>'0020503679',
                                'from'=>'500010707',
                                'message'=> $Random_Generate ,
                                'to'=>json_encode($rcpt_nm),
                                'op'=>'send'
                            );
                            
                $handler = curl_init($url);             
                curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($handler, CURLOPT_POSTFIELDS, $param);                       
                curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
                $response2 = curl_exec($handler);
                $response2 = json_decode($response2);
                $res_code = $response2[0];
                $res_data = $response2[1];
                //  echo $res_data;

                return redirect(route('reset.show',compact('pk_user')));
        
                /*
                if( $res_data )
                {    
                           
                }
                else
                {
                    return redirect()->back()->with('report',' خطا : مشکل درعملیات پایگاه داده');
                }
                */
                  
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

    public function callbackpayment(Request $request)
    {
        $user = User::where('mobile',request()->mobile)->first();

        $transaction =  Transaction::where('digital_receipt', request()->digital_receipt )->get()->first();
        $transaction->extras = request()->mobile ;
        $transaction->save();

        if($user == null)
        {
            return redirect(route('register',
            ['pk_product' => request()->pk_product ,
                'title' =>  request()->title ,
                'digital_receipt'=>  request()->digital_receipt
                ]))->with('success','برای مشاهده و دریافت دوره آموزشی  فرم ثبت نام  زیر را تکمیل کنید');    

        }
        else
        {
                    return redirect(route('login',
            ['pk_product' => request()->pk_product ,
                'title' =>  request()->title ,
                'digital_receipt'=>  request()->digital_receipt 
                ]))->with('success','برای مشاهده و دریافت دوره آموزشی  اطلاعات خود را وارد کنید');    

        }
    }


    public function showcallbackloginform(Request $request)
    {
        return view('auth.callbacklogin');
    }
    


    public function callbacklogin(Request $request)
    {
        $user = User::where('mobile',request()->mobile)->first();

        if($user == null)
        {
            return redirect(route('register'));    
        }
        else
        {
            return redirect(route('login')); 

        }
    }




  

}
