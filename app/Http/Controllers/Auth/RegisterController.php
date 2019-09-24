<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Profile;
use App\Classes\PayamakSefid\SendSms;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
   

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $messages = [
            'name.required' => 'نام  وارد نشده است',
            'name.min' => 'نام صحیح نمی باشد',
            'mobile.required' => 'شماره تلفن وارد نشده است',
            'mobile.max' => 'شماره تلفن صحیح وارد نشده است',
            'mobile.numeric' => 'شماره تلفن صحیح وارد نشده است',
            'mobile.digits' => 'شماره تلفن همراه صحیح نمی باشد',
            'mobile.unique' => 'شماره تلفن همراه قبلا ثبت نام شده است',
            'password.required' => 'رمز عبور وارد نشده است',
            'password.min' => 'رمز عبور صحیح وارد نشده است',
        
        ];

        return Validator::make($data, [
            'name' => ['required', 'string', 'min:5'],
            'mobile' => ['required', 'numeric', 'unique:Users','digits:11'],
            'password' => ['required', 'string', 'min:3',],
        ], $messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $user =  User::create([
            'name' => $data['name'],
            'mobile' => $data['mobile'],
            'password' => Hash::make($data['password']),
            'type' => 'کاربر',
         ]);

         $new_user = User::where('mobile',$data['mobile'])->first();
            
            $profile = new Profile();
            $profile->pk_users = $new_user->pk_users ;

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
           
            //                 //    
            return $user;


    }
}
