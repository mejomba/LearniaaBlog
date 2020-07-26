<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Profile;
use App\Transaction;
use App\Package;
use App\Rules\validate;
use App\Course;

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
            'username.required' => 'نام کاربری وارد نشده است',
            'username.validate' => ' نام کاربری صحیح وارد نشده است',
            'username.unique' => 'شماره تلفن همراه قبلا ثبت نام شده است',
            'password.required' => 'رمز عبور وارد نشده است',
            'password.min' => 'رمز عبور صحیح وارد نشده است',
        ];

        return Validator::make($data, [
            'name' => ['required', 'string', 'min:5'],
            'username' =>  ['required', new validate],
            'password' => ['required', 'string', 'min:3'],
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
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'type' => 'کاربر',
            'attract' => $data['attract']
         ]);

         $new_user = User::where('username',$data['username'])->first();
            
            $profile = new Profile();
            $profile->pk_users = $new_user->pk_users ;
            $profile->save();

            /* add contact to sms panel */
            $check = substr($data['username'],'0','2');
            if ($check=='09')
            {
        }
            /* add contact to sms panel */
             /* Check Register User For Learniaa Academy */
            if( $data['digital_receipt'] != "null")
            {
                $transaction =  Transaction::where('digital_receipt', $data['digital_receipt'] )->get()->first();
                $transaction->pk_users = $new_user->pk_users ;
                $transaction->save();

                $BeginnerTree = Package::where('title','پکیج کامل دوره آموزش کامپیوتر مبتدیان')->first();
                $pkPackage_BeginnerTree =  $BeginnerTree['pk_package'];
                if( $pkPackage_BeginnerTree == $transaction->pk_package )
                {
                    $this->redirectTo = '/academy/course?pk_tree=18' ;
                }
                else
                {

                    $course = Course::where('pk_package',$data['pk_package'])->first();
                    $this->redirectTo = '/academy/show/'.$data['pk_package'] . '/'   .$course['name'];
                    
                }
            }
            else
            {
              //  $this->redirectTo = '/';

                $this->redirectTo = $data['redirectFromURL'];
            }
             /* Check Register User For Learniaa Academy */


            // Finaly Process Register //
            return $user;

          
    }
}
