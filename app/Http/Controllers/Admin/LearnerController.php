<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LearnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instance_Model_learner = new learner();
        $names =   $instance_Model_product->GetListAllNameColumns_ForTable();
        $learner = Learner::get();
        return view('admin.learner.index',compact('learner','names'));    
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $user =  Auth::user() ;
        $pk_user =  $user->pk_users ;
        $profile = Profile::where('pk_user',$pk_user)->get();
        $pk_profile = $profile->pk_profile ;
        return view('admin.learner.create',compact('pk_user','pk_profile'));  
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
             $new_instance = new Learner();
    
             
    
                 // process User --> Get info Writer And Save $new_instance
                 $user =  Auth::user() ;
                 $new_instance->pk_writers =  $user->pk_users ;
            
             $new_instance->pk_learner = request()->pk_learner ;
             $new_instance->pk_user = request()->pk_user ;
            
             $new_instance->pk_profile = request()->pk_profile ;
             $new_instance->pic = request()->pic     ;
             $new_instance->desc = request()->desc     ;

    
             /// process pic --> uploading And move to Web storage And Change Name And Save to $new_instance
    
                $pic = request()->file('pic_content');
                $pic_name = $pic->getClientOriginalName();
                $pic->move(public_path('images'),$pic_name);
                $new_instance->pic_content = $pic_name ;
    
    
               
                if(  $new_instance->save())
                {
                    return redirect(route('admin.learner.index'))->with('success','پست با موفقیت ایجاد شد ');
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
        $learner = Learner::find($id);
        $user = User::find($learner->pk_user);
        $learner = Profile::find($profile->pk_profile);

        $learners = Learner::get();

        return view('admin.product.edit',compact('product','categories'));  
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
            // Get Selected Item Fron DB  
            $learner = Learner::find($id);

           
            
             $product->pk_learner = request()->pk_learner ;
             $product->pk_user = request()->pk_user ;
             $product->pk_profile = request()->pk_profile ;
             $product->desc = request()->desc ;
     
             $pic = request()->file('pic_content');
             $pic_name = $pic->getClientOriginalName();
             $pic->move(public_path('images'),$pic_name);
             $new_instance->pic_content = $pic_name ;
 
     

             if(  $product->save())
             {
                 return redirect(route('admin.learner.index'))->with('success','مدرس با موفقیت ویرایش شد ');
             }
             else
             {
                 return redirect()->back()->with('error','خطا : مشکل در');
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
        $learner = learner::find($id);
    
        if (  $learner->delete() )
        {
            return redirect(route('admin.learner.index'))->with('success',' مدرس با موفقیت حذف شد ');
        }
        else
        {
            return redirect()->back()->with('error','خطا : مشکل در');
        }

    }
    public function validation(Request $request)
    {

        $rules =  [
                    'pic' => 'file|nullable',
                    'desc' => 'required|string|min:3|max:300',
                 ];

    $messages = [
                'desc.max' => 'محتوا بلند تر از حد مجاز وارد شده است',
                'desc.string' => 'محتوا صحیح نمی باشد',
                'desc.required' => 'محتوا  وارد نشده است',
                'desc.min' => 'محتوا کوتاه تر از حد مجاز وارد شده است',
                'pic.file' => 'تصویر شاخص  صحیح وارد نشده است',
                ];

        $validator = Validator::make($request->all(),$rules,$messages);

        return $validator ;
    }


}
