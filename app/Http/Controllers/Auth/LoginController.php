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
use App\Course;
use App\Transaction;
use App\Package;
use App\Rules\validate;
use App\User;

use Socialite;


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
                if(request()->redirectFromURL == 'http://127.0.0.1:8000/reset/showcallbackloginform' || 
                    request()->redirectFromURL == 'https://learniaa.com/reset/showcallbackloginform' )
                 {
                     return redirect(route('index'));
                 }

                if(request()->redirectFromURL == 'https://learniaa.com/' || request()->redirectFromURL == 'http://127.0.0.1:8000/' )
               {
                return redirect('admin/home/index');
               } 
               return redirect(request()->redirectFromURL); 
        }
        
        elseif ($user->type == "کاربر")
         {
                    if(request()->redirectFromURL == 'http://127.0.0.1:8000/reset/showcallbackloginform' || 
                       request()->redirectFromURL == 'https://learniaa.com/reset/showcallbackloginform' )
                    {
                        return redirect(route('index'));
                    }
                    else 
                    {
                        if(isset(request()->pk_package))
                        {
                            if(request()->pk_package != 'Null')
                            {
                                return redirect(route('package.pay',
                                ['pk_package' => request()->pk_package ,
                                'redirectFromURL' => request()->redirectFromURL ]));
                            }
                        }
                        return redirect(request()->redirectFromURL); 
                    }
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
        $validator =  $this->validation($request);
        if ($validator->fails())
           {
                return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
          }
        else
          {
                    $rules =  [
                                'username' => ['required', new validate], 
                                'password' => 'required|min:3',
                              ];
            
                    $messages = [
                                'username.required' => 'نام کاربری وارد نشده است',
                                'password.required' => 'رمز عبور وارد نشده است',
                                'password.min' => 'رمز عبور صحیح وارد نشده است',
                              ];

                    $this->validate($request,$rules, $messages);
          }      
    }


    public function validation(Request $request)
    {
        $rules =  [ 'username' => ['required', new validate], 
                    'password' => 'required|min:3',];
        $messages = [ 'username.required' => 'نام کاربری وارد نشده است',
                       'username.validate' => ' نام کاربری صحیح وارد نشده است',
                       'password.required' => 'رمز عبور وارد نشده است',
                       'password.min' => 'رمز عبور صحیح وارد نشده است',];
        $validator = Validator::make($request->all(),$rules,$messages);
        return $validator ;
    }

    public function username()
    { return 'username' ; } 

    public function redirectToProvider()
    { return Socialite::driver('google')->redirect(); }
        
    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect()->route('reset.callbacklogin');
        }
    
        $existingUser = User::where('username', $user->getEmail())->first();
    
        if ($existingUser) {
            auth()->login($existingUser, true);
        } 
        else {
                $email = $user->getEmail();
                $len = strlen($email);
                $email = substr($email,4,$len);
               return view('auth.register',compact('email'));
           }
        return redirect($this->redirectPath());
    }

}
