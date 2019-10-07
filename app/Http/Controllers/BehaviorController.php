<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Behavior;
use Validator;
use Auth;

class BehaviorController extends Controller
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
                // User //
                $user =  Auth::user() ;
                $pk_users =  $user->pk_users ;
                // User //    

                $behavior = new Behavior();
                $behavior->pk_post = request()->pk_post ;
                $behavior->pk_users =  $pk_users ;
                $behavior->type = request()->type;
                $behavior->content = request()->content;
                $behavior->status = 'تایید نشده';
        
                if($behavior->save())
                { 
                    $request->session()->flash('success', 'نظر شما ثبت شد و پس از تایید نمایش داده می شود');
                        return redirect()->back();
                }
                else
                {
                    return redirect()->back()->with('report',' خطا : مشکل درعملیات پایگاه داده');
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
                    'content' => 'required|String',  
                   
               
                 ];

    $messages = [
                'content.required' => 'نظر شما وارد نشده است',
                'content.String' => 'نظر شما صحیح وارد نشده است',
                ];

        $validator = Validator::make($request->all(),$rules,$messages);

        return $validator ;
    }


}
