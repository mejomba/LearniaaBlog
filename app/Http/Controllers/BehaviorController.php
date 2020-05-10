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
                if(request()->pk_post != null)
                {
                    $behavior->pk_entity = request()->pk_post ;
                }
                if(request()->pk_product != null)
                {
                    $behavior->pk_entity = request()->pk_product ;
                }
               
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


    public function AddLike(Request $request)
    {
        $pk_Entity = $_POST['pk_Entity'];
        $pk_user = $_POST['pk_user'];
        $type = 'like';
        $content = 'لایک';
        $status = 'ثبت شده';

        $behavior = new Behavior();
                
                $behavior->pk_entity = $pk_Entity;
                $behavior->pk_user = $pk_user;
                $behavior->type = $type;
                $behavior->content = $content;
                $behavior->status = $status;


                if($behavior->save())
                {
                    return response()->json('کاربر لایک کرد');

                }
                else
                {
                    return response()->json('خطا در عملیات پایگاه داده');

                }
            }


            public function AddDislike(Request $request)
            {


             

            
                $pk_Entity = $_POST['pk_Entity'];
                $pk_user = $_POST['pk_user'];
                $type = 'disslike';
                $content = 'دیسلایک';
                $status = 'ثبت شده';
        

                $user = Behavior::where('pk_users', $user->pk_users)->get()->first();

                if($user && $type=='like')
                {
                    $type = 'disslike';

                
                    return response()->json($vote_data);
                }
                else
                {
                    return response()->json("Vote Not Found");
                }
                   $behavior = new Behavior();
                       
                      
                        $behavior->pk_entity = $pk_Entity;
                        $behavior->pk_user = $pk_user;
                        $behavior->type = $type;
                        $behavior->content = $content;
                        $behavior->status = $status;
        
        
                        if($behavior->save())
                        {
                            return response()->json('کاربر دیسلایک کرد');
        
                        }
                        else
                        {
                            return response()->json('خطا در عملیات پایگاه داده');
        
                        }
                    }

                    public function ShareContenet(Request $request)
                    {
                    
                        $pk_Entity = $_POST['pk_Entity'];
                        $pk_user = $_POST['pk_user'];
                        $type = 'disslike';
                        $content = 'اشتراک گذاری';
                        $status = 'ثبت شده';
                
                           $behavior = new Behavior();
                               
                              
                                $behavior->pk_entity = $pk_Entity;
                                $behavior->pk_user = $pk_user;
                                $behavior->type = $type;
                                $behavior->content = $content;
                                $behavior->status = $status;
                
                
                                if($behavior->save())
                                {
                                    return response()->json('کاربر مطلب را به اشتراک گذاشت ');
                
                                }
                                else
                                {
                                    return response()->json('خطا در عملیات پایگاه داده');
                
                                }
                            }













}
