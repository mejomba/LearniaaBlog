<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile;
use App\User;
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
        //
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
    public function store(Request $request)
    {
      

    }

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
        
       return view('admin.profile.edit',compact('profile'));
    }
   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
    
                if($profile->save())
                {
                        return redirect(route('admin.home'))->with('success','پروفایل با موفقیت  شد');

                  if(request()->password)
                  {
                    $user = User::where('pk_users',$user->pk_users)->first();
                    $user->password =  Hash::make(request()->password)   ; 
                    $user->save();

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

    public function validation(Request $request)
    {

        $rules =  [
                    'month_birthday' => 'nullable|numeric', 
                    'year_birthday' => 'nullable|numeric|digits:4', 
                    'day_birthday' => 'nullable|numeric', 
                    'email' => 'nullable|email',
                    'state' => 'nullable|String', 
                    'pic' => 'nullable|file',
                    'address' => 'nullable|String',
                    'password' => 'nullable|min:6'  ,
                 ];

             
    $messages = [
                'month_birthday.numeric' => ' ماه تاریخ تولد صحیح وارد نشده است',
                'day_birthday.numeric' => ' روز تاریخ تولد صحیح وارد نشده است',
                'year_birthday.numeric' => 'سال تاریخ تولد صحیح وارد نشده است',
                'year_birthday.digits' => 'سال تاریخ تولد 4 رقمی وارد نشده است',
                
                'pic.file' => 'فیلد تصویر فاقد فایل تصویر است',

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
