<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Behavior;
use Validator;
use Auth;

class BehaviorController extends Controller
{
    public function store(Request $request)
    { 
        $validator =  $this->validation($request);
        if ($validator->fails())
           { return redirect()->back()->withErrors($validator)->withInput();} 
       else{  
               $behavior = new Behavior();
                $user =  Auth::user() ;
                $pk_users =  $user->pk_users ;
                $behavior->pk_users =  $pk_users ;
                $behavior->type_entity = request()->type_entity ;
                $behavior->pk_entity = request()->pk_entity ;
                $behavior->type_behavior = request()->type_behavior ;
                $behavior->content = request()->content;
               
                if($behavior->save())
                { $request->session()->flash('success', 'نظر شما ثبت شد');
                    return redirect()->back(); }        
                else { return redirect()->back()->with('report',' خطا : مشکل درعملیات پایگاه داده');}
           }
    }

    public function validation(Request $request)
    { $rules =  ['content' => 'required|String', ];  
      $messages = ['content.required' => 'نظر شما وارد نشده است',
                   'content.String' => 'نظر شما صحیح وارد نشده است',];
      $validator = Validator::make($request->all(),$rules,$messages);          
      return $validator ;         
    }          

}
