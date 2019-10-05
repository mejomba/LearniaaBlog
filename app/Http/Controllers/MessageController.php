<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use Validator;

class MessageController extends Controller
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
        $validator =  $this->validation($request);

        if ($validator->fails())
        {
                return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
        }
    
        else
        {  

            
            $Message = new Message(); 
            $Message->name = request()->name ; 
            $Message->email = request()->email ;  
            $Message->message = request()->message ;     

            if($Message->save())
            {
                    return redirect(route('Contactus'))->with('success','پیام با موفقیت ارسال شد');
            }
            else
            {
                return redirect()->back()->with('error','خطا : مشکل در');
            }

        }
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
    public function edit($id)
    {
        //
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
        //
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
                    'name' => 'required|String|max:50',  
                    'email' => 'required|email|max:70',
                    'message' => 'required|String|max:500', 
               
                 ];

    $messages = [
                 'email.email' => 'پست الکترونیکی  صحیح وارد نشده است ',
                 'email.required' => 'پست الکترونیکی وارد نشده است',
                 'email.max' => 'پست الکترونیکی طولانی وارد شده است',
              
                'name.required' => 'نام  وارد نشده است',
                'name.String' => 'نام  صحیح وارد نشده است',
                'name.max' => 'نام  طولانی وارد شده است',

                'message.required' => 'پیام  وارد نشده است',
                'message.String' => 'پیام  صحیح وارد نشده است',
                'message.max' => 'پیام  طولانی وارد شده است',


                ];

        $validator = Validator::make($request->all(),$rules,$messages);

        return $validator ;
    }

}