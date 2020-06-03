<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;

class NotificationController extends Controller
{



    public function create()
    {
        $Notification = Notification::get();
       
        return view('user.notification.create',compact('Notification'));
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
             $new_instance = new Notification();
    
           
 
             }

             $new_instance->day = request()->day ;
             $new_instance->duration = request()->duration;
           
            
            


                if(  $new_instance->save())
                {
                    return redirect(route('user.home'))->with('success','برنامه یادگیری با موفقیت ایجاد شد ');
                }
                else
                {
                    return redirect()->back()->with('report',' خطا : مشکل درعملیات پایگاه داده');
                }
          }
    
    
        
          public function edit()
          {
              $user =  Auth::user() ; 
              $profile = Profile::where('pk_users',$user->pk_users)->first();
              
             return view('user.profile.edit',compact('profile'));
          }






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
                      $profile->day =  request()->year_birthday . '-'. request()->month_birthday . '-'. request()->day_birthday   ;
                      $profile->duration =  request()->duration   ;
                     
                    
                     
          
                      if($profile->save())
                      {
                          if(request()->password)
                          {
                            $user = User::where('pk_users',$user->pk_users)->first();
                            $user->password =  Hash::make(request()->password)   ; 
                            $user->save();
        
                          }  
      
                          $is_Learner = Learner::where('pk_user',$user->pk_users)->first();
                          if($is_Learner != null)
                          {
                              return redirect(route('user.learner.edit',$is_Learner['pk_learner']));
                          }  
                          else
                          {
                              return redirect(route('user.home'))->with('success','برنامه زمانی یادگیری با موفقیت ویرایش شد');
                          }  
      
      
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
                          'day' => 'nullable|numeric', 
                          'duration' => 'nullable|numeric|digits:4', 
                       
               ];
      
           
      $messages = [
                      'month_birthday.numeric' => ' ماه تاریخ تولد صحیح وارد نشده است',
                      'day_birthday.numeric' => ' روز تاریخ تولد صحیح وارد نشده است',
                      'year_birthday.numeric' => 'سال تاریخ تولد صحیح وارد نشده است',
                      'year_birthday.digits' => 'سال تاریخ تولد 4 رقمی وارد نشده است',
                      
                  
              ];
      
              $validator = Validator::make($request->all(),$rules,$messages);
      
              return $validator ;
          }
      



}
