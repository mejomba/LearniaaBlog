<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\facades\Auth;
use App\User;
use App\Profile;
use App\Behavior;
use Validator;
use Hash;
use App\Classes\PayamakSefid\SendSms;

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
            $user->mobile = request()->mobile ;
            $user->password = Hash::make(request()->password)   ; 
           
           
            $profile = new Profile();
          
    
                if($user->save())
                {
                    $id = User::where('mobile',request()->mobile)->first();
                   
                    $profile->pk_users =  $id['pk_users'] ;
                    $profile->save();

                                // add contact to sms panel //


           
            date_default_timezone_set("Asia/Tehran");
            $APIKey = '9e748ce762b7c17478c4b783';
            $SecretKey = 'H$c7M~Ax#Z@7Y%3';

              $PayamakSefid = new SendSms($APIKey,$SecretKey);
              $Groups =  $PayamakSefid->GetContactGroups();
              $Groups = $Groups->ContactGroups ; 

             $ContactData = array(
                'ContactsDetails' => array(
                                            array(
                                                'Prefix' => ' ',
                                                'FirstName' => ' ',
                                                "LastName" => $data['name'] ,
                                                'Mobile' =>   $data['mobile'],
                                                'EmojiId' => '1'
                                            )
                                         ),
                'GroupId' =>  $Groups[0]->GroupId
            );


              $PayamakSefid->AddContacts($ContactData);
           
            //  End (add contact to sms panel) //

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
        return view('admin.user.edit',compact('user'));
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
            $user->mobile = request()->mobile ;
            $user->password = Hash::make(request()->password)   ; 

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
                    'mobile' => 'required|numeric|min:3|unique:users',
                    'password' => 'nullable|min:6'  ,
                  
                 ];

            



    $messages = [

        'type.required' => 'نوع وارد نشده است',
        'type.String' => 'نوع صحیح وارد نشده است',

        'name.required' => 'نام  وارد نشده است',
        'name.min' => ' نام  کوتاه تر از حد مجاز است',
        'name.String' => 'نام صحیح وارد نشده است',

        'mobile.unique' => 'شماره تلفن همراه قبلا ثبت نام شده است',
        'mobile.required' => 'شماره تلفن همراه  وارد نشده است',
        'mobile.min' => ' شماره تلفن همراه  کوتاه تر از حد مجاز است',
        'mobile.numeric' => ' شماره تلفن همراه صحیح وارد نشده است ',

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
                    'mobile' => 'required|numeric|min:3',
                    'password' => 'nullable|min:6'  ,
                  
                 ];

            



    $messages = [

        'type.required' => 'نوع وارد نشده است',
        'type.String' => 'نوع صحیح وارد نشده است',

        'name.required' => 'نام  وارد نشده است',
        'name.min' => ' نام  کوتاه تر از حد مجاز است',
        'name.String' => 'نام صحیح وارد نشده است',

        
        'mobile.required' => 'شماره تلفن همراه  وارد نشده است',
        'mobile.min' => ' شماره تلفن همراه  کوتاه تر از حد مجاز است',
        'mobile.numeric' => ' شماره تلفن همراه صحیح وارد نشده است ',

        'password.required' => 'رمز عبور وارد نشده است',
        'password.min' => 'رمز عبور کوتاه تر از حد مجاز است',
                ];

        $validator = Validator::make($request->all(),$rules,$messages);

        return $validator ;
    }

    

    

}
