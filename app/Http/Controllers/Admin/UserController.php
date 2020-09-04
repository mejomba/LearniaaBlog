<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\Profile;
use App\Behavior;
use Validator;
use Hash;


class UserController extends Controller
{
    public function create()
    {
        return view('admin.user.create');
    }

    public function index()
    {
        $users = User::get();
        $instance_Model_user =new User();
        $names =  $instance_Model_user->GetListAllNameColumns_ForTable();
        //dd($users);
        return view('admin.user.index',compact('users','names'));
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
            $user = new User();
            $user->name = request()->name ;
            $user->type = request()->type ;
            $user->username = request()->username ;
            $user->password = Hash::make(request()->password)   ; 
            $user->attract = 'ایجاد شده مدیریتی' ;
           
            $profile = new Profile();
          
    
                if($user->save())
                {
                    $id = User::where('username',request()->username)->first();
                   
                    $profile->pk_users =  $id['pk_users'] ;
                    
                    if(request()->pic)
                     {
                        $pic = request()->file('pic');
                        $pic_name = $pic->getClientOriginalName();
                        $path = Storage::putFileAs( 'profile', $pic, $pic_name);
                        $profile->pic = $pic_name ;
                     } 

                    $profile->extras =  request()->extras ;
                    $profile->save();

                       return redirect(route('admin.user.index'))->with('success','کاربر با موفقیت ایجاد شد');
                }
                else
                {
                    return redirect()->back()->with('report',' خطا : مشکل درعملیات پایگاه داده');
                }
           }
    }


    public function edit($id)
    {
        $user = User::find($id);
        $profile = Profile::where('pk_users', $user->pk_users)->get()->first();
        $wallet =  $profile->wallet ;
        return view('admin.user.edit',compact('user','wallet'));
    }



    public function update(Request $request,$id)
    {
        $validator =  $this->validation_Edit_Without_unique_mobile($request);

        if ($validator->fails())
           {
                return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
          }
    
        else
          {  
            $user = User::find($id);
            $user->name = request()->name ;
            $user->type = request()->type ;
            $user->username = request()->username ;
           
            if( request()->password != null )
            {
                $user->password = Hash::make(request()->password)   ; 
            }

            /* Update Wallet Manually By Admin */
            $profile = Profile::where('pk_users', $user->pk_users)->get()->first();
            $profile->wallet = request()->wallet ;
            if(request()->pic)
            {
               $pic = request()->file('pic');
               $pic_name = $pic->getClientOriginalName();
               $path = Storage::putFileAs( 'profile', $pic, $pic_name);
               $profile->pic = $pic_name ;
            } 

           $profile->extras =  request()->extras ;
            $profile->save();
            /* Update Wallet Manually By Admin */

                if($user->save())
                {
                        return redirect(route('admin.user.index'))->with('success','کاربر با موفقیت ویرایش شد');
                }
                else
                {
                    return redirect()->back()->with('report',' خطا : مشکل درعملیات پایگاه داده');
                }
           }


    }



    public function destroy($id)
    {
        $user = User::find($id);
        
    
        if($user->delete())
        {

            $profile = Profile::where('pk_users',$id)->delete();
            $behavior = Behavior::where('pk_users',$id)->delete();
            return redirect(route('admin.user.index'))->with('success','کاربر با موفقیت حذف شد ');
        }
        else
        {
            return redirect()->back()->with('report',' خطا : مشکل درعملیات پایگاه داده');
        }
  
      }




    public function validation(Request $request)
    {

        $rules =  [
                    'type' => 'required|String', 
                    'name' => 'required|min:3|String', 
                    'username' => 'required|min:3|unique:users',
                    'password' => 'nullable|min:6'  ,
                    'wallet' => 'nullable|String'  ,
                 ];

            



    $messages = [

        'type.required' => 'نوع وارد نشده است',
        'type.String' => 'نوع صحیح وارد نشده است',

        'name.required' => 'نام  وارد نشده است',
        'name.min' => ' نام  کوتاه تر از حد مجاز است',
        'name.String' => 'نام صحیح وارد نشده است',

        'username.unique' => 'مشخصه کاربری  قبلا ثبت نام شده است',
        'username.required' => 'مشخصه کاربری   وارد نشده است',
        'username.min' => ' مشخصه کاربری   کوتاه تر از حد مجاز است',
        

        'password.required' => 'رمز عبور وارد نشده است',
        'password.min' => 'رمز عبور کوتاه تر از حد مجاز است',
                ];

        $validator = Validator::make($request->all(),$rules,$messages);

        return $validator ;
    }



    public function validation_Edit_Without_unique_mobile(Request $request)
    {

        $rules =  [
                    'type' => 'required|String', 
                    'name' => 'required|min:3|String', 
                    'username' => 'required|min:3',
                    'password' => 'nullable|min:6'  ,
                  
                 ];

            



    $messages = [

        'type.required' => 'نوع وارد نشده است',
        'type.String' => 'نوع صحیح وارد نشده است',

        'name.required' => 'نام  وارد نشده است',
        'name.min' => ' نام  کوتاه تر از حد مجاز است',
        'name.String' => 'نام صحیح وارد نشده است',

        
        'username.required' => 'مشخصه کاربری  وارد نشده است',
        'username.min' => ' مشخصه کاربری   کوتاه تر از حد مجاز است',
        

        'password.required' => 'رمز عبور وارد نشده است',
        'password.min' => 'رمز عبور کوتاه تر از حد مجاز است',
                ];

        $validator = Validator::make($request->all(),$rules,$messages);

        return $validator ;
    }

    

    

}
