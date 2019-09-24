<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Session\Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    use AuthenticatesUsers;

    protected function authenticated(Request $request, $user)
    {
        if ( $user->type == "مدیر" )
        {
            return redirect('admin/home/index');
        }
        elseif ( $user->type == "نویسنده")
        {
            return redirect('/');     
        }
        elseif ($user->type == "کاربر")
         {
           return redirect('/');
          }

    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
   {
        $this->middleware('guest')->except('logout');
    }

    protected function validateLogin(Request $request)
    {
        $rules =  [
                     'mobile' => 'required|numeric', 
                    'password' => 'required|min:3',
                 ];
        
        $messages = [
            'mobile.required' => 'تلفن همراه وارد نشده است',
            'mobile.numeric' => 'شماره تلفن همراه صحیح نمی باشد',
            'password.required' => 'رمز عبور وارد نشده است',
            'password.min' => 'رمز عبور صحیح وارد نشده است',
        ];

        $this->validate($request,$rules, $messages);
            
    }


    public function username()
{
    return 'mobile';
}
}
