<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Validator;
use Carbon\Carbon;
use Illuminate\Http\File;
use App\Course;
use App\Package;
use App\Learner;



class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $instance_Model_course = new Course();
        $names =   $instance_Model_course->GetListAllNameColumns_ForTable();
        $courses = Course::orderBy('pk_course','ASC')->get();
      
        return view('admin.course.index',compact('courses','names')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $packages = Package::get();
        $learners = Learner::get();
        return view('admin.course.create',compact('packages','learners'));       
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
             $new_instance = new Course();

             $new_instance->name = request()->name;
             $new_instance->pk_package = request()->pk_package ;
             $new_instance->pk_learner = request()->pk_learner ;
             $new_instance->sort = request()->sort ;

             $select_package = Package::where('pk_package',request()->pk_package)->first();
             if(request()->pic_cover)
             {
                $pic = request()->file('pic_cover');
                $pic_name = $pic->getClientOriginalName();
                $path = Storage::putFileAs('course'.'/'. $select_package->folder , $pic, $pic_name);
                $new_instance->pic_cover = $pic_name ;
            } 

            $new_instance->Alt_cover = request()->Alt_cover ;
            $new_instance->isFree = request()->isFree ;
            $new_instance->download_link = request()->download_link ;

            /* SEO */
            /* Metatags */
          
            /* Metatags */

            /* Schema Product */
            $now = Carbon::now();
            
            $schema = [
              "@context"=> "https://schema.org",
              "@type"=> "Product",
              "name" => request()->name,
              "image" => Storage::url('package'.$select_package->pic) ,
              "description" => request()->name,
              "offer_type" => "Offer",
              "priceCurrency" => "IRR",
              "price" => $select_package->price,
              "itemCondition" =>"https://schema.org/NewCondition",
              "datePublished" => $now->toDateString(),
              "dateModified" =>$now->toDateString()
          ];

            $new_instance->schema_markup = json_encode($schema);
            /* Schema Product */

           /* Schema Video */
            $videoschema=[
                "@context"=> "https://schema.org",
                "@type"=> "VideoObject",
                "name"=>  request()->name,
                "description"=>request()->name,
                "thumbnailUrl"=> Storage::url('course'.'/'. $select_package->folder .$pic_name),
                "uploadDate" => $now->toDateString()
              ];

              $new_instance->video_schema = json_encode($videoschema);
            /* Schema Video */

                if($new_instance->save())
                {
                    return redirect(route('admin.course.index'))->with('success','درس با موفقیت ایجاد شد ');
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
    public function repair()
    {
        $courses = Course::orderBy('pk_course','ASC')->get();
        foreach ($courses as $course )
         { 
             $row = Course::find($course['pk_course']);
             $str = substr($row['download_link'],9,strlen($row['download_link']));
             $row['download_link'] = $str ;
             $row->save();
         }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::find($id);
        $packages = Package::get();
        $learners = Learner::get();
        $package = Package::where('pk_package',$course->pk_package)->first();
        $learner = Learner::where('pk_learner',$course->pk_learner)->first();
        return view('admin.course.edit',compact('course','package','packages','learners','learner'));       
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
              $course = Course::find($id);

             $course->name = request()->name;
             $course->pk_package = request()->pk_package ;
             $course->pk_learner = request()->pk_learner ;
             $course->sort = request()->sort ;

             $select_package = Package::where('pk_package',request()->pk_package)->first();
             if(request()->pic_cover)
             {
                $pic = request()->file('pic_cover');
                $pic_name = $pic->getClientOriginalName();
                $path = Storage::putFileAs('course'.'/'. $select_package->folder , $pic, $pic_name);
                $course->pic_cover = $pic_name ;
            } 

            $course->Alt_cover = request()->Alt_cover ;
            $course->isFree = request()->isFree ;
            $course->download_link = request()->download_link ;

            /* SEO */
            /* Metatags */
           
            /* Metatags */

            /* Schema Product */
            $now = Carbon::now();
            
            $schema = [
              "@context"=> "https://schema.org",
              "@type"=> "Product",
              "name" => request()->name,
              "image" => Storage::url('package'.$select_package->pic) ,
              "description" => request()->name,
              "offer_type" => "Offer",
              "priceCurrency" => "IRR",
              "price" => $select_package->price,
              "itemCondition" =>"https://schema.org/NewCondition",
              "datePublished" => $now->toDateString(),
              "dateModified" =>$now->toDateString()
          ];

            $course->schema_markup = json_encode($schema);
            /* Schema Product */

           /* Schema Video */
            $videoschema=[
                "@context"=> "https://schema.org",
                "@type"=> "VideoObject",
                "name"=>  request()->name,
                "description"=>request()->name,
                "thumbnailUrl"=> Storage::url('course'.'/'. $select_package->folder .$course->pic_cover),
                "uploadDate" => $now->toDateString()
              ];

              $course->video_schema = json_encode($videoschema);
            /* Schema Video */

                if($course->save())
                {
                    return redirect(route('admin.course.index'))->with('success','درس با موفقیت ویرایش شد ');
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
        $Course = Course::find($id);
    
        if($Course->delete())
        {
            return redirect(route('admin.course.index'))->with('success','درس با موفقیت حذف شد ');
        }
        else
        {
            return redirect()->back()->with('report',' خطا : مشکل درعملیات پایگاه داده');
        }
    }

    public function validation(Request $request)
    {
        $rules =  [
                    'pk_package' => 'required|numeric', 
                    'pk_learner' => 'required|numeric',
                    'name' => 'required',
                    'pic_cover' => 'image|mimes:jpeg,png,jpg,gif,svg|nullable',
                    'sort' => 'required',
                    'Alt_cover' => 'required',
                    'download_link' => 'required',
                    'keywords' => 'required',
                    'description' => 'required',
                    'author' => 'required',
                    'refresh' => 'required',
                    'viewport' => 'required',
                    'og_title' => 'required',
                    'og_image' => 'required',
                    'og_description' => 'required',
                    'og_type' => 'required',
                    'og_article' => 'required',
                    'twitter_card' => 'required',
                    'twitter_site' => 'required',
                    'twitter_description' => 'required',
                    'twitter_title' => 'required',
                 ];

    $messages = [
                'pk_package.required' => 'کلید پکیج وارد نشده است',
                'pk_package.numeric' => 'کلید پکیج صحیح وارد نشده است ',
                'pk_learner.required' => 'کلید مدرس وارد نشده است',
                'pk_learner.numeric' => 'کلید مدرس صحیح وارد نشده است ',
                'name.required' => 'عنوان درس  وارد نشده است',
                'pic_cover.image' => 'تصویر شاخص  صحیح وارد نشده است',
                'pic_cover.mimes' => 'فرمت تصویر شاخص  صحیح وارد نشده است',
                'sort.required' => 'ترتیب  وارد نشده است',
                'Alt_cover.required' => 'ALT  وارد نشده است',
                'download_link.required' => 'لینک دانلود  وارد نشده است',
                'keywords.required' => 'keywords  وارد نشده است',
                'description.required' => 'description   وارد نشده است',
                'author.required' => 'author  وارد نشده است',
                'refresh.required' => 'refresh  وارد نشده است',
                'viewport.required' => 'viewport  وارد نشده است',
                'og_title.required' => 'og_title  وارد نشده است',
                'og_image.required' => 'og_image  وارد نشده است',
                'og_description.required' => 'og_description  وارد نشده است',
                'og_type.required' => 'og_type  وارد نشده است',
                'og_article.required' =>  'og_article  وارد نشده است',
                'twitter_card.required' => 'twitter_card  وارد نشده است',
                'twitter_site.required' => 'twitter_site  وارد نشده است',
                'twitter_description.required' =>'twitter_description  وارد نشده است',
                'twitter_title.required' =>'twitter_title  وارد نشده است',
               ];

        $validator = Validator::make($request->all(),$rules,$messages);

        return $validator ;
    }



    public function duplicate($id,Request $request)
    {
        $current_course = Course::find($id);
        $course = new Course();

        $course->pk_package =  $current_course->pk_package ;
        $course->pk_learner =  $current_course->pk_learner ;
        $course->name = $current_course->name;
        $course->sort =  $current_course->sort ;
        $course->pic_cover = $current_course->pic_cover;
        $course->Alt_cover = $current_course->Alt_cover ;
        $course->download_link =$current_course->download_link ;
        $course->metatag=$current_course->metatag;
        $course->schema_markup=$current_course->schema_markup;
        $course->video_schema = $current_course->video_schema;
        $course->isFree = $current_course->isFree;

        if($course->save())
        {
            return redirect(route('admin.course.edit',['id'=>$id]))->with('success','درس با موفقیت ایجاد شد ');
        }
        else
        {
            return redirect()->back()->with('report',' خطا : مشکل درعملیات پایگاه داده');
        }
    }
}
