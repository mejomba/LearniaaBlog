<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\Learner;
use Validator;
use Auth;
use App\package;
use App\Course;

class LearnerController extends Controller
{
    public function edit($id)
    {
        $learner = Learner::find($id);
      
      //  $users = User::get();

        $users =  Auth::user() ;

        return view('user.learner.edit',compact('users','learner'));  
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
                return redirect(route('user.home'))->with('success','مدرس با موفقیت ویرایش شد');
                
             }
             else
             {
                 return redirect()->back()->with('report',' خطا : مشکل درعملیات پایگاه داده');
             }

        }
            
          
    }

  
    public function validation(Request $request)
    {

        $rules =  [
                    'pic' => 'image|mimes:jpeg,png,jpg,gif,svg|nullable',
                    'desc' => 'nullable|string|min:3|max:300',
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
    public function report()
    {
        $learner = Learner::where('pk_user',auth::user()->pk_users)->first();
        $packs = json_decode($learner->extras);
        $packages = Package::wherein('pk_package',$packs)->get();
        $names = new Package();
        $names =$names->GetListAllNameColumns_ForLearner();
        return view('user.learner.coursereport',compact('packages','names'));

    }
    public function details($id)
    {
        $courses = course::where('pk_package',$id)->orderby('sort','asc')->get();
        $names = new course();
        $names =$names->GetListAllNameColumns_ForLearner();
        return view('user.learner.details',compact('courses','names'));
    }
}
