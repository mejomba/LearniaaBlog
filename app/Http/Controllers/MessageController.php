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
            $Message->username = request()->username ;  
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
            $Message = new Message(); 
            $Message->name = request()->name; 
            $Message->username = request()->username ;  
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


    public function validation(Request $request)
    {
        $rules =[ 'username' => ['required', new validate],  ];
        $messages = ['username.required' => 'ایمیل یا شماره موبایل وارد نشده است',
                     'username.validate' => ' ایمیل یا شماره موبایل صحیح وارد نشده است', ];
        
        $validator = Validator::make($request->all(),$rules,$messages);
        return $validator ;
   }

}
