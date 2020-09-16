<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Learner;
use Validator;
use Auth;
use App\Profile;
use App\User;
use Illuminate\Support\Facades\Storage;

class LearnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* Security Admin Panel */
        if(Auth::user()->type != 'Admin'){ return redirect()->back(); }
        /* Security Admin Panel */        
        $instance_Model_learner = new learner();
        $names =   $instance_Model_learner->GetListAllNameColumns_ForTable();
        $learners = Learner::get();
        return view('admin.learner.index',compact('learners','names'));    
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::get();  
        return view('admin.learner.create',compact('users'));  
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
    

             $new_instance->pk_user = request()->pk_users ;
             $profile = Profile::where('pk_users', request()->pk_users)->get()->first();
             $new_instance->pk_profile = $profile->pk_profiles ;
             $new_instance->desc = request()->desc ;
             $new_instance->job = request()->job ;


    
             /// process pic --> uploading And move to Web storage And Change Name And Save to $new_instance
    
             if(request()->pic)
             {
                $pic = request()->file('pic');
                $pic_name = $pic->getClientOriginalName();
                $path = Storage::putFileAs( 'learner', $pic, $pic_name);
                $new_instance->pic = $pic_name ;
            }   
    
               
                if(  $new_instance->save())
                {
                    return redirect(route('admin.learner.index'))->with('success','مدرس با موفقیت ایجاد شد ');
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
        $learner = Learner::find($id);
      
        $users = User::get();

        return view('admin.learner.edit',compact('users','learner'));  
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

             $learner->desc = request()->desc ;
             $learner->job = request()->job ;
     
             if(request()->pic)
             {
                $pic = request()->file('pic');
                $pic_name = $pic->getClientOriginalName();
                $path = Storage::putFileAs( 'learner', $pic, $pic_name);
                $learner->pic = $pic_name ;
            }  
     

             if($learner->save())
             {
                 return redirect(route('admin.learner.index'))->with('success','مدرس با موفقیت ویرایش شد ');
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
                    'pic' => 'image|mimes:jpeg,png,jpg,gif,svg|nullable',
                    'desc' => 'nullable|string|min:3',
                    'job' => 'required|string|min:3|max:300'
                 ];

    $messages = [
                    'pic.image' => 'تصویر شاخص  صحیح وارد نشده است',
                    'pic.mimes' => 'فرمت تصویر شاخص  صحیح وارد نشده است',
                    'desc.max' => 'محتوا بلند تر از حد مجاز وارد شده است',
                    'desc.string' => 'محتوا صحیح نمی باشد',
                    'desc.min' => 'محتوا کوتاه تر از حد مجاز وارد شده است',
                    'job.max' => 'حوزه کاری بلند تر از حد مجاز وارد شده است',
                    'job.string' => 'حوزه کاری صحیح نمی باشد',
                    'job.required' => 'حوزه کاری  وارد نشده است',
                    'job.min' => 'حوزه کاری کوتاه تر از حد مجاز وارد شده است',
                ];

        $validator = Validator::make($request->all(),$rules,$messages);

        return $validator ;
    }


}
