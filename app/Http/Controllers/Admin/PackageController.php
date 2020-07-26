<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Package;
use App\Tree;
use App\Category;
use App\Tag;
use App\Search;
use Validator;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Model_Package = new Package();
        $names =   $Model_Package->GetListAllNameColumns_ForTable();
        $packages = Package::orderBy('pk_package', 'desc')->get();
        return view('admin.package.index',compact('packages','names'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('type','محصول')->get();
        $tags = Tag::where('type','محصول')->get();
        $trees = Tree::get();
        return view('admin.package.create',compact('categories','tags','trees'));
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
             $new_instance = new Package();

             $new_instance->pk_tree = request()->pk_tree;
             $new_instance->pk_category = request()->pk_category ;

             if(request()->pk_tags != null)
             {  
                 $pk_search = uniqid(); 
                 
                 foreach (request()->pk_tags as $key => $tag) 
                 {
                   $new_Search = new Search();
                   $new_Search->pk_search = $pk_search ;
                   $new_Search->pk_type = 'محصول';
                   $new_Search->pk_tag = $tag ;
                   $new_Search->save();
                 }
 
                 $new_instance->pk_search =  $pk_search ;
             }

             $new_instance->fa_name = request()->fa_name;
             $new_instance->en_name = request()->en_name ;
             $new_instance->sort_tree = request()->sort_tree;
             $new_instance->status = request()->status ;
             $new_instance->isFree = request()->isFree ;
             $new_instance->price = request()->price ;
             $new_instance->time = request()->time ;
             $new_instance->count = request()->count ;
             $new_instance->preview = request()->preview ;
             $new_instance->folder = request()->folder ;

             if(request()->pic)
             {
                $pic = request()->file('pic');
                $pic_name = $pic->getClientOriginalName();
                $path = Storage::putFileAs( 'package', $pic, $pic_name);
                $new_instance->pic = $pic_name ;
            } 

             $new_instance->desc = request()->desc ;

                if(  $new_instance->save())
                {
                    return redirect(route('admin.package.index'))->with('success','پکیج با موفقیت ایجاد شد ');
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
        $package = Package::find($id);
        $categories = Category::where('type','محصول')->get();
        $tags = Tag::where('type','محصول')->get();
        $trees = Tree::get();
        $row_Search = Search::where('pk_search', $package->pk_search)->select('pk_tag')->get();
        $Search =array();
        foreach ($row_Search as $search){array_push($Search,$search->pk_tag);}
        return view('admin.package.edit',compact('package','categories','tags','trees','Search'));
          
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
             $package = Package::find($id);

             $package->pk_tree = request()->pk_tree;
             $package->pk_category = request()->pk_category ;
    
             if(request()->pk_tags != null)
             {    
                   foreach (request()->pk_tags as $key => $tag) 
                   {
                       $row = Search::where('pk_tag',$tag)->where('pk_search',$package->pk_search)->first();
                       if($row == null)
                       {
                         $new_Search = new Search();
                         $new_Search->pk_search = $package->pk_search ;
                         $new_Search->pk_type = 'محصول';
                         $new_Search->pk_tag = $tag ;
                         $new_Search->save();
                       }
                   }
              }

              $package->fa_name = request()->fa_name;
              $package->en_name = request()->en_name ;
              $package->sort_tree = request()->sort_tree;
              $package->status = request()->status ;
              $package->isFree = request()->isFree ;
              $package->price = request()->price ;
              $package->time = request()->time ;
              $package->count = request()->count ;
              $package->preview = request()->preview ;
              $package->folder = request()->folder ;

              if(request()->pic)
              {
                 $pic = request()->file('pic');
                 $pic_name = $pic->getClientOriginalName();
                 $path = Storage::putFileAs('package', $pic, $pic_name);
                 $package->pic = $pic_name ;
             } 

              $package->desc = request()->desc ;

                if($package->save())
                {
                    return redirect(route('admin.package.index'))->with('success','پکیج با موفقیت ویرایش شد ');
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
        $Package = Package::find($id);
        
        if($Package->delete())
        {
            return redirect(route('admin.package.index'))->with('success','پکیج با موفقیت حذف شد ');
        }
        else
        {
            return redirect()->back()->with('report',' خطا : مشکل درعملیات پایگاه داده');
        }
    }

    
    public function upload(Request $request)
    {
            if($request->hasFile('upload')) 
            {
               
              $pic = request()->file('upload');
              $pic_name = $pic->getClientOriginalName();
              $path = Storage::putFileAs( 'package', $pic, $pic_name);
              $url2 = Storage::url('package/'.$pic_name);
              $CKEditorFuncNum = $request->input('CKEditorFuncNum');
              $url =   $url2 ;   
              $msg = 'اپلود تصویر با موفقیت انجام شد';  
             @header('Content-type: text/html; charset=utf-8');

           return   $response = [
             "uploaded" => 1,
             "filename" =>  $pic_name,
             "url" => $url,
             "error" => $msg
             ];
          }
    }

    public function duplicate($id,Request $request)
    {
        $package = Package::find($id);
        $new_instance = new Package();

        $new_instance->pk_tree = $package->pk_tree;
        $new_instance->pk_category = $package->pk_category ;
        $new_instance->pk_search =  $package->pk_search ;
        $new_instance->fa_name = $package->fa_name;
        $new_instance->en_name = $package->en_name ;
        $new_instance->sort_tree = $package->sort_tree;
        $new_instance->status = $package->status ;
        $new_instance->price = $package->price ;
        $new_instance->time = $package->time ;
        $new_instance->count = $package->count ;
        $new_instance->preview = $package->preview ;
        $new_instance->desc = $package->desc ;

            if(  $new_instance->save())
            {
                return redirect(route('admin.package.edit' , ['id' => $id]))->with('success','پکیج با موفقیت کپی شد ');
            }
            else
            {
                return redirect()->back()->with('report',' خطا : مشکل درعملیات پایگاه داده');
            }

    }

    public function validation(Request $request)
    {

        $rules =  [
                    'pk_category' => 'required|numeric', 
                    'pk_tree' => 'required|numeric',
                    'fa_name' => 'required',
                    'en_name' => 'required',
                    'sort_tree' => 'required|numeric',
                    'status' => 'required',
                    'price' => 'required|numeric',
                    'time' => 'required',
                    'count' => 'required|numeric',
                    'preview' => 'required',
                    'desc' => 'required',
                 ];

    $messages = [
        
                'pk_category.required' => 'کلید دسته بندی وارد نشده است',
                'pk_category.numeric' => 'کلید دسته بندی صحیح وارد نشده است ',
                'pk_tree.required' => 'کلید درخت وارد نشده است',
                'pk_tree.numeric' => 'کلید درخت صحیح وارد نشده است ',
                'fa_name.required' => 'نام فارسی  وارد نشده است',
                'en_name.required' => 'نام انگلیسی  وارد نشده است',
                'sort_tree.required' => 'ترتیب اولویت  وارد نشده است',
                'sort_tree.numeric' => 'ترتیب اولویت  صحیح وارد نشده است',
                'status.required' => 'وضعیت  وارد نشده است',
                'price.required' => 'قیمت  وارد نشده است',
                'price.numeric' => 'قیمت  وارد شده صحیح نیست',
                'time.required' => 'زمان  وارد نشده است',
                'count.required' => 'تعداد ویدیو وارد نشده است',
                'count.numeric' => 'تعداد ویدیو صحیح وارد نشده است',
                'preview.required' => 'پیش نمایش محصول  وارد نشده است',
                'desc.required' => 'توضیحات  وارد نشده است',
                
               ];

        $validator = Validator::make($request->all(),$rules,$messages);

        return $validator ;
    }

}
