<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Assist;

class AssistController extends Controller
{
    public function store_assist(Request $request)
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
             $new_instance = new Assist();
    
             
             $new_instance->pk_assist = request()->pk_assist ;
             $new_instance->name = request()->name ;
             $new_instance->lastname = request()->lastname;
             $new_instance->coursename = request()->coursename;
             $new_instance->expertise = request()->expertise ;
             $new_instance->phonenumber = request()->phonenumber;
             $new_instance->email = request()->email;

                 
                if(  $new_instance->save())
                {
                    return redirect(route('admin.product.index'))->with('success','با شما تماس خواهیم گرفت ');
                }
                else
                {
                    return redirect()->back()->with('report',' خطا : مشکل درعملیات پایگاه داده');
                }

            }
        }








                public function validation(Request $request)
                {
            
                    $rules =  [
                                'pk_assist' => 'required|numeric', 
                                'name' => 'required|string',
                                'lastname' => 'required',
                                'coursename' => 'required|string',
                                'expertise' => 'required|string',
                                'phonenumber' => 'required|numeric',
                                'email' => 'required',
                                
                             ];
            
                $messages = [
                  
                    
                            'pk_assist.required' => 'کلید همکاری  وارد نشده است',
                            'name.required' => 'نام وارد نشده است ',
                            'name.string' => 'نام درست وارد نشده است ',
                            'lastname.required' => 'نام خانوادگی وارد نشده است ',
                            'coursename.required' => 'نام درست وارد نشده است ',
                            'coursename.string' => 'نام دوره درست وارد نشده است ',
                            'expertise.required' => 'تخصص  وارد نشده است ',
                            'expertise.string' => 'تخصص  درست وارد نشده است ',
                            'phonenumber.required' => 'شماره تلفن  وارد نشده است ',
                            'phonenumber.numeric' => 'شماره تلفن به درستی وارد نشده است ',
                            'email.required' => 'ایمیل وارد نشده است ',
                            'email.numeric' => 'ایمیل به درستی وارد نشده است ',

                           ];
            
                    $validator = Validator::make($request->all(),$rules,$messages);
            
                    return $validator ;







          }
    
    
        
        }

