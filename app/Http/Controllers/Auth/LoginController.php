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

use App\Transaction;
use App\Product;
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
          
            if( request()->digital_receipt  != "null")
            {
                $transaction =  Transaction::where('digital_receipt', request()->digital_receipt )->get()->first();
                $transaction->pk_users = $user->pk_users ;
                $transaction->save();

                $BeginnerTree = Product::where('title','پکیج کامل آموزش کامپیوتر')->first();
                $pkProduct_BeginnerTree =  $BeginnerTree['pk_product'];
                if( $pkProduct_BeginnerTree == $transaction->pk_product )
                {
                    return redirect()->route('academy.detail')->with('success','خرید انجام شد . می توانید دوره آموزشی را مشاهده نمایید');    
                }
                else
                {
                return redirect('/academy/show/'.request()->pk_product.'/'.request()->title); 
                }
            }


            else
            {
           
            return redirect('admin/home/index');
            }

           
        }
        elseif ( $user->type == "نویسنده")
        {
            if( request()->digital_receipt != "null")
            {
                $transaction =  Transaction::where('digital_receipt', request()->digital_receipt )->get()->first();
                $transaction->pk_users = $user->pk_users ;
                $transaction->save();

                return redirect('/academy/show/'.request()->pk_product.'/'.request()->title); 
            }
            else
            {
           
              return redirect('admin/post/index');  
            }
              
        }
        elseif ($user->type == "کاربر")
         {

                if( request()->digital_receipt  != "null")
                {
                    $transaction =  Transaction::where('digital_receipt', request()->digital_receipt )->get()->first();
                    $transaction->pk_users = $user->pk_users ;
                    $transaction->save();

                    $BeginnerTree = Product::where('title','پکیج کامل آموزش کامپیوتر')->first();
                    $pkProduct_BeginnerTree =  $BeginnerTree['pk_product'];
                    if( $pkProduct_BeginnerTree == $transaction->pk_product )
                    {
                        return redirect()->route('academy.detail')->with('success','خرید انجام شد . می توانید دوره آموزشی را مشاهده نمایید');    
                    }
                    else
                    {

                      return redirect('/academy/show/'.request()->pk_product.'/'.request()->title); 
                    }
                }

                else
                {
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
        $rules =  [
            'username' => ['required', new validate], 
           'password' => 'required|min:3',
        ];

        $messages = [
        'username.required' => 'نام کاربری وارد نشده است',
        'username.validate' => ' نام کاربری صحیح وارد نشده است',
        'password.required' => 'رمز عبور وارد نشده است',
        'password.min' => 'رمز عبور صحیح وارد نشده است',
        ];


        $validator = Validator::make($request->all(),$rules,$messages);

        return $validator ;
    }

    public function username()
    {
        return 'username' ;
        
    }
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

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
            /*
            $newUser                    = new User;
            $newUser->provider_name     = $driver;
            $newUser->provider_id       = $user->getId();
            $newUser->name              = $user->getName();
            $newUser->email             = $user->getEmail();
            //$newUser->email_verified_at = now();
            //$newUser->avatar            = $user->getAvatar();
            $newUser->save();
    
            auth()->login($newUser, true);
            */
        }
    
        return redirect($this->redirectPath());
    

        // $user->token;
    }

}
