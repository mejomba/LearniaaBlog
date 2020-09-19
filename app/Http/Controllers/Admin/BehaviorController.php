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
        /* Security Admin Panel */
        if(Auth::user()->type != 'مدیر'){ return redirect()->back(); }
        /* Security Admin Panel */
        $behavior = Behavior::where('type_behavior','کامنت')->get();
        $instance_Model_Behavior =new Behavior();
        $names = $instance_Model_Behavior->GetListAllNameColumns_ForTable();
        return view('admin.behavior.index', compact('names','behavior'));
    }

    public function edit($id)
    {        
        /* Security Admin Panel */
        if(Auth::user()->type != 'مدیر'){ return redirect()->back(); }
        /* Security Admin Panel */
        $behavior = Behavior::find($id);
        return view('admin.behavior.edit',compact('behavior'));
    }

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
            $behavior->reply = request()->reply;
           
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
                    'reply' => 'nullable|String',  
                ];

    $messages = [
               
                'reply.String' => 'نظر شما صحیح وارد نشده است',
                ];

        $validator = Validator::make($request->all(),$rules,$messages);

        return $validator ;
    }








  

}
