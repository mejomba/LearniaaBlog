<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        $behavior = Behavior::get();
        $instance_Model_Behavior =new Behavior();
        $names = $instance_Model_Behavior->GetListAllNameColumns_ForTable();
        return view('admin.behavior.index', compact('names','behavior'));
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
        //
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
        $behavior = Behavior::find($id);
        return view('admin.behavior.edit',compact('behavior'));
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
            $behavior = Behavior::find($id);
            $behavior->status = request()->status;
           
            $data_extras = array();

            if(request()->reply)
            { 
                $data_extras["reply"] =  request()->reply  ;
                
            }

            if($data_extras != null)
                {
                    $behavior->extras =  json_encode($data_extras,false) ;
                }

      /////////////////////////////////////////////
    
            if($behavior->save())
            {
                    return redirect(route('admin.behavior.index'))->with('success','نظر با موفقیت ویرایش شد');
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
                    'reply' => 'required|String',  
                   
               
                 ];

    $messages = [
                'reply.required' => 'نظر شما وارد نشده است',
                'reply.String' => 'نظر شما صحیح وارد نشده است',
                ];

        $validator = Validator::make($request->all(),$rules,$messages);

        return $validator ;
    }



}
