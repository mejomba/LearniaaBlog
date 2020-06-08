<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile;
use App\User;
use App\Learner;
use Validator;
use Auth;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        ////
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

    /*

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
             $new_instance = new Profile();
         }

             $new_instance->birthday = request()->birthday ;
             $new_instance->email = request()->email;
             $new_instance->state = request()->state;
             $new_instance->address = request()->address;
             $new_instance->job = request()->job;
             $new_instance->favourite = request()->favourite;
             $new_instance->area = request()->area;
            
             if(request()->pic)
             {
                $pic = request()->file('pic');
                $pic_name = $pic->getClientOriginalName();
                $path = Storage::putFileAs( 'product', $pic, $pic_name);
                $new_instance->pic = $pic_name ;
            } 


                if(  $new_instance->save())
                {
                    return redirect(route('user.home'))->with('success','پروفایل با موفقیت ایجاد شد ');
                }
                else
                {
                    return redirect()->back()->with('report',' خطا : مشکل درعملیات پایگاه داده');
                }
          }
    
    /*
        
        




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
    
     public function edit()
    {
        $user =  Auth::user() ; 
        $profile = Profile::where('pk_users',$user->pk_users)->first();
        
       return view('user.profile.edit',compact('profile'));
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
        $validator =  $this->validation($request);

        if ($validator->fails())
           {
                return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
          }
    
            else
            {
                  // process User --> Get info Writer And Save $new_instance
                  $user =  Auth::user() ;
                 
                $profile = Profile::find($id);
                $profile->birthday =  request()->year_birthday . '-'. request()->month_birthday . '-'. request()->day_birthday   ;
                $profile->email =  request()->email   ;
                $profile->state = request()->state    ;
                $profile->address =  request()->address   ;
                $profile->job =  request()->job   ;
                $profile->favourite =  request()->favourite   ;
                $profile->amount_time =  request()->amount_time   ;
                $profile->area =  request()->area   ;
                $profile->pk_users =  $user->pk_users ;

                if(request()->pic)
                {
                    $pic = request()->file('pic');
                    $pic_name = $pic->getClientOriginalName();
                    $path = Storage::putFileAs( 'profile', $pic, $pic_name);
                    $profile->pic = $pic_name ;
                } 
                else
                {
                    $profile->pic = 'profile_default.jpg' ;
                }

                
    

                if($profile->birthday != null && $profile->email != null && $profile->state != null  &&  $profile->address != null  &&  $profile->job != null  &&  $profile->favourite != null  &&  $profile->amount_time != null)
                {
                    $profile->complete =  'YES'   ;

                }  
                else
                {
                    $profile->complete =  'NO'  ;
                }   


                if($profile->save())
                {
                    

                    $is_Learner = Learner::where('pk_user',$user->pk_users)->first();
                    if($is_Learner != null)
                    {
                        return redirect(route('user.learner.edit',$is_Learner['pk_learner']));
                    }  
                    else
                    {
                        return redirect(route('user.home'))->with('success','پروفایل با موفقیت ویرایش شد');
                    }  


                }
                else
                {
                    return redirect()->back()->with('report',' خطا : مشکل درعملیات پایگاه داده');
                }
               
            }
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

    public function validation_Update(Request $request)
    {

        $rules =  [
                    'month_birthday' => 'nullable|numeric', 
                    'year_birthday' => 'nullable|numeric|digits:4', 
                    'day_birthday' => 'nullable|numeric', 
                    'email' => 'nullable|email',
                    'state' => 'nullable|String', 
                    'address' => 'nullable|String',
                    'job' => 'nullable|String',
                    'favourite' => 'nullable|String',
                    'area' => 'nullable|String',
                    'pic' => 'image|mimes:jpeg,png,jpg,gif,svg|nullable',
                    'password' => 'nullable|min:6'  ,
         ];

     
$messages = [
                'month_birthday.numeric' => ' ماه تاریخ تولد صحیح وارد نشده است',
                'day_birthday.numeric' => ' روز تاریخ تولد صحیح وارد نشده است',
                'year_birthday.numeric' => 'سال تاریخ تولد صحیح وارد نشده است',
                'year_birthday.digits' => 'سال تاریخ تولد 4 رقمی وارد نشده است',
                
                'pic.image' => 'تصویر شاخص  صحیح وارد نشده است',
                'pic.mimes' => 'فرمت تصویر شاخص  صحیح وارد نشده است',

                'email.email' => 'پست الکترونیکی  صحیح وارد نشده است ',
                'state.String' => 'استان صحیح وارد نشده است',
            
                'address.String' => 'آدرس  صحیح وارد نشده است ',

                'password.required' => 'رمز عبور وارد نشده است',
                'password.min' => 'رمز عبور کوتاه تر از حد مجاز است',
        ];

        $validator = Validator::make($request->all(),$rules,$messages);

        return $validator ;
    }

    


    
    public function validation_Store(Request $request)
    {

        $rules =  [
                    'month_birthday' => 'nullable|numeric', 
                    'year_birthday' => 'nullable|numeric|digits:4', 
                    'day_birthday' => 'nullable|numeric', 
                    'email' => 'nullable|email',
                    'state' => 'nullable|String', 
                    'address' => 'nullable|String',
                    'job' => 'nullable|String',
                    'favourite' => 'nullable|String',
                    'area' => 'nullable|String',
                    'pic' => 'image|mimes:jpeg,png,jpg,gif,svg|nullable',
                    'password' => 'nullable|min:6'  ,
         ];

     
$messages = [
                'month_birthday.numeric' => ' ماه تاریخ تولد صحیح وارد نشده است',
                'day_birthday.numeric' => ' روز تاریخ تولد صحیح وارد نشده است',
                'year_birthday.numeric' => 'سال تاریخ تولد صحیح وارد نشده است',
                'year_birthday.digits' => 'سال تاریخ تولد 4 رقمی وارد نشده است',
                
                'pic.image' => 'تصویر شاخص  صحیح وارد نشده است',
                'pic.mimes' => 'فرمت تصویر شاخص  صحیح وارد نشده است',

                'email.email' => 'پست الکترونیکی  صحیح وارد نشده است ',
                'state.String' => 'استان صحیح وارد نشده است',
            
                'address.String' => 'آدرس  صحیح وارد نشده است ',

                'password.required' => 'رمز عبور وارد نشده است',
                'password.min' => 'رمز عبور کوتاه تر از حد مجاز است',
        ];

        $validator = Validator::make($request->all(),$rules,$messages);

        return $validator ;
    }


}
