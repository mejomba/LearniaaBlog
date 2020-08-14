<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use Validator;
use Auth;
use App\Profile;
use App\Rules\validate;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

            $Message = new Message(); 
              $Message->name = request()->name ; 
                $Message->email = request()->email ;  
                $Message->message = request()->message ;  
            

                    if($Message->save())
                    {
                            return redirect(route('Contactus'))->with('success','پیام با موفقیت ارسال شد');
                    }
                    else
                    {
                        return redirect()->back()->with('report',' خطا : مشکل درعملیات پایگاه داده');
                    }
                   
        }
    }

    public function newspaper(Request $request)
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

            $check = substr(request()->email,0,2);

            $Message = new Message(); 
            $user =  Auth::user() ;

            if(isset($user->pk_users))
            {
                if($check != '09')
                {
                    $profile = Profile::where('pk_users',$user->pk_users)->first();
                    $profile->email = request()->email ; 
                    if($profile->save())
                    {
                        return redirect(route('index'))->with('success','عضویت در خبرنامه با موفقیت انجام شد');
                    }
                    else
                    {
                        return redirect()->back()->with('report',' خطا : مشکل درعملیات پایگاه داده');
                    }
                }
                elseif(strlen(request()->email)==11)
                {
                    $profile = Profile::where('pk_users',$user->pk_users)->first();
                    $profile->email = request()->email ; 
                    if($profile->save())
                    {
                        return redirect(route('index'))->with('success','عضویت در خبرنامه با موفقیت انجام شد');
                    }
                    else
                    {
                        return redirect()->back()->with('report',' خطا : مشکل درعملیات پایگاه داده');
                    }

                }
            }
             
            else
            {
                $Message->name = request()->name ; 
                $Message->email = request()->email ;  
                $Message->message = request()->message ;

                    if($Message->save())
                    {
                        return redirect(route('index'))->with('success','عضویت در خبرنامه با موفقیت انجام شد');
                    }
                    else
                    {
                        return redirect()->back()->with('report',' خطا : مشکل درعملیات پایگاه داده');
                    }
          } 

        }
    }




    public function newspaperMobile(Request $request)
    {
        $validator =  $this->validationByMobile($request);

        if ($validator->fails())
        {
                return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
        }
    
        else
        {  
            $Message = new Message(); 
            $user =  Auth::user() ;
            if(isset($user->pk_users))
            {

            }
             
            else
            {
                $Message->name = request()->name ; 
                $Message->email = request()->mobile ;  
                $Message->message = request()->message ;

                    if($Message->save())
                    {
                        return redirect()->back()->with('success','عضویت در خبرنامه با موفقیت انجام شد');
                    }
                    else
                    {
                        return redirect()->back()->with('report',' خطا : مشکل درعملیات پایگاه داده');
                    }
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
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function validation(Request $request)
    {

        $rules =  [
            'email' => ['required', new validate], 
        ];

        $messages = [
        'email.required' => 'ایمیل یا شماره موبایل وارد نشده است',
        'email.validate' => ' ایمیل یا شماره موبایل صحیح وارد نشده است',

        ];


        $validator = Validator::make($request->all(),$rules,$messages);

        return $validator ;
 
 }


    public function validationByMobile(Request $request)
    {

        $rules =  [
                    'name' => 'required|String|max:200',  
                    'mobile' => 'required',
                    'message' => 'required|String|max:500', 
               
                 ];

    $messages = [
                 
                 'mobile.required' => 'پست الکترونیکی وارد نشده است',
                 'mobile.max' => 'پست الکترونیکی طولانی وارد شده است',
              
                'name.required' => 'نام  وارد نشده است',
                'name.String' => 'نام  صحیح وارد نشده است',
                'name.max' => 'نام  طولانی وارد شده است',

                'message.required' => 'پیام  وارد نشده است',
                'message.String' => 'پیام  صحیح وارد نشده است',
                'message.max' => 'پیام  طولانی وارد شده است',


                ];

        $validator = Validator::make($request->all(),$rules,$messages);

        return $validator ;
    }




}
