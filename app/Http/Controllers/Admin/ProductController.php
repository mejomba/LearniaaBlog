<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Tag;
use App\Product;
use App\Learner;
use App\Category;
use App\User;
use App\Search;
use Validator;
use Illuminate\Http\File;

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
        $products = Product::orderBy('pk_product', 'desc')->get();
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

             $new_instance->pk_category = request()->pk_category ;
             $new_instance->pk_learner = request()->pk_learner;
             $new_instance->title = request()->title;
             $new_instance->alt = request()->alt ;

             if(request()->pic)
             {
                $pic = request()->file('pic');
                $pic_name = $pic->getClientOriginalName();
                $path = Storage::putFileAs( 'product', $pic, request()->title);
                $new_instance->pic = request()->title ;
            } 
            
            $htmlmeta=array(
                "keywords" => request()->keywords,
                "description" => request()->description,
                "author" => request()->author,
                "refresh" => request()->refresh,
                "viewport" => request()->viewport
    
            );
            $openg=array(
                "og_title" => request()->og_title,
                "og_image" => request()->og_image,
                "og_description" => request()->og_description,
                "og_type" => request()->og_type,
                "og_article" => request()->og_article
            );
            $twitter=array(
                "twitter_card" => request()->twitter_card,
                "twitter_site" => request()->twitter_site,
                "twitter_description" => request()->twitter_description,
                "twitter_title" => request()->twitter_title,
            );
            $metatags=["htmlmeta"=>$htmlmeta ,"opengraph" => $openg , "twitter"=>$twitter];

             $new_instance->price = request()->price;
             $new_instance->time = request()->time;
             $new_instance->desc = request()->desc;
             $new_instance->count = request()->count;
             $new_instance->language = request()->language;
             $new_instance->subtitle = request()->subtitle;
             $new_instance->status = request()->status;
             $new_instance->file = request()->file;
             $new_instance->preview = request()->preview;
             $new_instance->download_link = request()->download_link;
            
             $new_instance->metatag=json_encode($metatags);

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
        $product = Product::find($id);
        return redirect(route('product.detail',  ['slug' => $product['pk_product'] , 'desc' =>  $product['title'] ] ));
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

        $meta=json_decode($product->metatag);

        $row_Search = Search::where('pk_search', $product->pk_search)->select('pk_tag')->get();
        $Search =array();
        foreach ($row_Search as $search)
        {
          
          array_push($Search,$search->pk_tag);
        }

        return view('admin.product.edit',compact('product','categories','tags','learners','Search','meta'));  
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
             $product = Product::find($id);

    
             if(request()->pk_tags != null)
             {    
                   foreach (request()->pk_tags as $key => $tag) 
                   {
                       $row = Search::where('pk_tag',$tag)->where('pk_search',$product->pk_search)->first();
                       if($row == null)
                       {
                         $new_Search = new Search();
                         $new_Search->pk_search = $product->pk_search ;
                         $new_Search->pk_type = 'محصول';
                         $new_Search->pk_tag = $tag ;
                         $new_Search->save();
                       }
                   }
              }

             $product->pk_category = request()->pk_category ;
             $product->pk_learner = request()->pk_learner;
             $product->title = request()->title;
            
             if(request()->pic)
             {
                $pic = request()->file('pic');
                $pic_name = $pic->getClientOriginalName();
                $path = Storage::putFileAs( 'product', $pic, $pic_name);
                $product->pic = $pic_name ;
            } 

            $meta=json_decode($product->metatag);

            $meta->htmlmeta->keywords = request()->keywords;
            $meta->htmlmeta->description = request()->description;
            $meta->htmlmeta->author = request()->author;
            $meta->htmlmeta->refresh = request()->refresh;
            $meta->htmlmeta->viewport = request()->viewport;
    
            $meta->opengraph->og_title = request()->og_title;
            $meta->opengraph->og_image = request()->og_image;
            $meta->opengraph->og_description = request()->og_description;
            $meta->opengraph->og_type = request()->og_type;
            $meta->opengraph->og_article = request()->og_article;
    
            $meta->twitter->twitter_card = request()->twitter_card;
            $meta->twitter->twitter_site = request()->twitter_site;
            $meta->twitter->twitter_description = request()->twitter_description;
            $meta->twitter->twitter_title = request()->twitter_title;
            
            $product->metatag=json_encode($meta);



             $product->price = request()->price;
             $product->time = request()->time;
             $product->desc = request()->desc;
             $product->count = request()->count;
             $product->language = request()->language;
             $product->subtitle = request()->subtitle;
             $product->status = request()->status;
             $product->file = request()->file;
             $product->preview = request()->preview;
             $product->download_link = request()->download_link;
             
                if($product->save())
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
                    'pic' => 'image|mimes:jpeg,png,jpg,gif,svg|nullable',
                    'price' => 'required|numeric',
                    'time' => 'required',
                    'desc' => 'required',
                    'count' => 'required|numeric',
                    'language' => 'required',
                    'subtitle' => 'required',
                    'file' => 'required',
                    'preview' => 'required',
                    'download_link' => 'required',
                 ];

    $messages = [
      
        
                'pk_category.required' => 'کلید دسته بندی وارد نشده است',
                'pk_category.numeric' => 'کلید دسته بندی صحیح وارد نشده است ',
                'pk_learner.required' => 'کلید مدرس وارد نشده است',
                'pk_learner.numeric' => 'کلید مدرس صحیح وارد نشده است ',
                'title.required' => 'عنوان  وارد نشده است',
                'pic.image' => 'تصویر شاخص  صحیح وارد نشده است',
                'pic.mimes' => 'فرمت تصویر شاخص  صحیح وارد نشده است',
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
                /*
              $originName = $request->file('upload')->getClientOriginalName();
              $fileName = pathinfo($originName, PATHINFO_FILENAME);
              $extension = $request->file('upload')->getClientOriginalExtension();
              $fileName = $fileName.'_'.time().'.'.$extension;
              $request->file('upload')->move(public_path('images/product'), $fileName);

              */

              $pic = request()->file('upload');
              $pic_name = $pic->getClientOriginalName();
              $path = Storage::putFileAs( 'product', $pic, $pic_name);
              $url2 = Storage::url('product/'.$pic_name);


              $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            //  $url = asset('images/product'.$fileName);
            $url =   $url2 ;   
              $msg = 'اپلود تصویر با موفقیت انجام شد'; 
           //   $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
                
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
        $product = product::find($id);
        $new_instance = new product();
        $new_instance->pk_search =  $product->pk_search ;
        $new_instance->pk_category = $product->pk_category ;
        $new_instance->pk_learner = $product->pk_learner;
        $new_instance->title = $product->title;
        $new_instance->pic = $product->pic_name ;
        $new_instance->price = $product->price;
        $new_instance->time = $product->time;
        $new_instance->desc = $product->desc;
        $new_instance->count = $product->count;
        $new_instance->language = $product->language;
        $new_instance->subtitle = $product->subtitle;
        $new_instance->status = $product->status;
        $new_instance->file = $product->file;
        $new_instance->preview = $product->preview;
        $new_instance->download_link = $product->download_link;
            
            if(  $new_instance->save())
            {
                return redirect(route('admin.product.edit' , ['id' => $id]))->with('success','محصول با موفقیت ایجاد شد ');
            }
            else
            {
                return redirect()->back()->with('report',' خطا : مشکل درعملیات پایگاه داده');
            }

    }









}
