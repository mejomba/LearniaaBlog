<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tag;
use App\Product;
use App\Learner;
use App\Category;
use App\User;
use Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instance_Model_product = new Product();
        $names =   $instance_Model_product->GetListAllNameColumns_ForTable();
        $products = Product::get();
        return view('admin.product.index',compact('products','names'));    }

    /**a
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $learners = Learner::get();
        $categories = Category::where('type','محصول')->get();
        $tags = Tag::where('type','محصول')->get();
        return view('admin.product.create',compact('categories','tags','learners'));
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
             $new_instance = new Product();
    
             if(request()->pk_tags != null)
             {  
                $data_tags = json_encode(request()->pk_tags,false);  
                $new_instance->pk_tag =  $data_tags ;
             }
    
             $new_instance->pk_category = request()->pk_category ;
             $new_instance->pk_learner = request()->pk_learner;
             $new_instance->title = request()->title;
            
             if(request()->pic)
             {
                $pic = request()->file('pic');
                $pic_name = $pic->getClientOriginalName();
                $pic->move(public_path('images/product'),$pic_name);
                $new_instance->pic = $pic_name ;
            } 

             $new_instance->price = request()->price;
             $new_instance->time = request()->time;
             $new_instance->desc = request()->desc;
             $new_instance->count = request()->count;
             $new_instance->language = request()->language;
             $new_instance->subtitle = request()->subtitle;
             $new_instance->status = request()->status;
             $new_instance->file = request()->file;
             $new_instance->preview = request()->preview;
                 
                if(  $new_instance->save())
                {
                    return redirect(route('admin.product.index'))->with('success','محصول با موفقیت ایجاد شد ');
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::where('type','محصول')->get();
        $tags = Tag::where('type','محصول')->get();
        $learners = Learner::get();

        return view('admin.product.edit',compact('product','categories','tags','learners'));  
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
             $new_instance = Product::find($id);
    
             if(request()->pk_tags != null)
             {  
                $data_tags = json_encode(request()->pk_tags,false);  
                $new_instance->pk_tag =  $data_tags ;
             }
             else
             {
                $new_instance->pk_tag =  "" ;
             }
    
             $new_instance->pk_category = request()->pk_category ;
             $new_instance->pk_learner = request()->pk_learner;
             $new_instance->title = request()->title;
            
             if(request()->pic)
             {
                $pic = request()->file('pic');
                $pic_name = $pic->getClientOriginalName();
                $pic->move(public_path('images/product'),$pic_name);
                $new_instance->pic = $pic_name ;
            } 

             $new_instance->price = request()->price;
             $new_instance->time = request()->time;
             $new_instance->desc = request()->desc;
             $new_instance->count = request()->count;
             $new_instance->language = request()->language;
             $new_instance->subtitle = request()->subtitle;
             $new_instance->status = request()->status;
             $new_instance->file = request()->file;
             $new_instance->preview = request()->preview;
                 
                if($new_instance->save())
                {
                    return redirect(route('admin.product.index'))->with('success','محصول با موفقیت ویرایش شد ');
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

            $product = Product::find($id);
        
            if($product->delete())
            {
                return redirect(route('admin.product.index'))->with('success','محصول با موفقیت حذف شد ');
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
                    'pk_learner' => 'required|numeric',
                    'title' => 'required',
                    'pic' => 'nullable|file',
                    'price' => 'required|numeric',
                    'time' => 'required',
                    'desc' => 'required',
                    'count' => 'required|numeric',
                    'language' => 'required',
                    'subtitle' => 'required',
                    'file' => 'required',
                    'preview' => 'required',
                 ];

    $messages = [
                
                'pk_category.required' => 'کلید دسته بندی وارد نشده است',
                'pk_category.numeric' => 'کلید دسته بندی صحیح وارد نشده است ',
                'pk_learner.required' => 'کلید مدرس وارد نشده است',
                'pk_learner.numeric' => 'کلید مدرس صحیح وارد نشده است ',
                'title.required' => 'عنوان  وارد نشده است',
                'pic.required' => 'تصویر  وارد نشده است',
                'pic.file' => 'فیلد تصویر فاقد فایل تصویر است',
                'price.required' => 'قیمت  وارد نشده است',
                'price.numeric' => 'قیمت  وارد شده صحیح نیست',
                'time.required' => 'زمان  وارد نشده است',
                'desc.required' => 'توضیحات  وارد نشده است',
                'count.required' => 'تعداد ویدیو وارد نشده است',
                'count.numeric' => 'تعداد ویدیو صحیح وارد نشده است',
                'language.required' => 'زبان آموزش وارد نشده است',
                'subtitle.required' => 'زیرنویس  وارد نشده است',
                'file.required' => 'فایل محصول  وارد نشده است',
                'preview.required' => 'پیش نمایش محصول  وارد نشده است',
               ];

        $validator = Validator::make($request->all(),$rules,$messages);

        return $validator ;
    }



    public function upload(Request $request)
    {
            if($request->hasFile('upload')) 
            {
              $originName = $request->file('upload')->getClientOriginalName();
              $fileName = pathinfo($originName, PATHINFO_FILENAME);
              $extension = $request->file('upload')->getClientOriginalExtension();
              $fileName = $fileName.'_'.time().'.'.$extension;
          
              $request->file('upload')->move(public_path('images/product'), $fileName);

              $CKEditorFuncNum = $request->input('CKEditorFuncNum');
              $url = asset('images/product'.$fileName); 
              $msg = 'Image uploaded successfully'; 
              $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
                
              @header('Content-type: text/html; charset=utf-8'); 
              echo $response;
          }
    }









}
