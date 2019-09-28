<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tag;
use App\Product;
use App\Learner;
use App\Category;

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
        $tags = Tag::get();
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
                $new_instance->pk_tags =  $data_tags ;
               }
    
                 // process User --> Get info Writer And Save $new_instance

             $new_instance->product = request()->product ;
             $new_instance->pk_categories = request()->pk_categories ;
             $new_instance->pk_tree = request()->pk_tree;
             $new_instance->pk_learner = request()->pk_learner;
             $new_instance->pk_behavior = request()->pk_behavior;
             $new_instance->title = request()->title;
             $pic = request()->file('pic');
             $new_instance->price = request()->price;
             $new_instance->time = request()->time;
             $new_instance->desc = request()->desc;
             $new_instance->count = request()->count;
             $new_instance->language = request()->language;
             $new_instance->subtitle = request()->subtitle;
                 
             /// process pic --> uploading And move to Web storage And Change Name And Save to $new_instance
    
    
    
                // process extras --> save all option to array And save to $new_instance
              
    
               // Save To database 
    
                if(  $new_instance->save())
                {
                    return redirect(route('admin.post.index'))->with('success','پست با موفقیت ایجاد شد ');
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
        $tags = Tag::get();
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
            // Get Selected Item Fron DB  
            $product = Product::find($id);

            //process
            if(request()->pk_tags != null)
            {  
              $data_tags = json_encode(request()->pk_tags,false);  
              $product->pk_tags =  $data_tags ;
             }

            
             $product->pk_tree = request()->pk_tree ;
             $product->pk_learner = request()->pk_learner ;
             $product->pk_behavior = request()->pk_behavior ;
             $product->title = request()->title ;
             $product->pic = request()->pic ;
             $product->price = request()->price ;
             $product->desc = request()->desc ;
             $product->count = request()->count ;
             $product->language = request()->language ;
             $product->subtitle = request()->subtitle ;

     
        
     

             if(  $product->save())
             {
                 return redirect(route('admin.product.index'))->with('success','محصول با موفقیت ویرایش شد ');
             }
             else
             {
                 return redirect()->back()->with('error','خطا : مشکل در');
             }



             ////


            
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

        $post = Product::find($id);
    
        if($product->delete())
        {
            return redirect(route('admin.product.index'))->with('success','محصول با موفقیت حذف شد ');
        }
        else
        {
            return redirect()->back()->with('error','خطا : مشکل در');
        }



    }


    public function validation(Request $request)
    {

        $rules =  [
                    'pk_product' => 'required|numeric', 
                    'pk_category' => 'required|min:3', 
                    'pk_tag' => 'required',
                    'pk_tree' => 'required',
                    'pk_learner' => 'required',
                    'pk_behavior' => 'required',
                    'title' => 'required|min:3',
                    'pic' => 'required|min:3',
                    'price' => 'required|min:3',
                    'time' => 'required|min:3',
                    'desc' => 'required|min:3',
                    'count' => 'required|min:3',
                    'language' => 'required|min:3',
                    'subtitle' => 'required|min:3',
                 ];

    $messages = [
                'pk_product.required' => 'کلید محصولات وارد نشده است',
                'pk_product.numeric' => 'کلید محصولات صحیح وارد نشده است ',
                'pk_category.required' => 'کلید دسته بندی وارد نشده است',
                'pk_category.numeric' => 'کلید دسته بندی صحیح وارد نشده است ',
                'pk_tag.required' => 'کلید تگ وارد نشده است',
                'pk_tree.required' => 'کلید درخت وارد نشده است',
                'pk_learner.required' => 'کلید مدرس وارد نشده است',
                'pk_behavior.required' => 'کلید رفتار وارد نشده است',


                'title.required' => 'عنوان  وارد نشده است',
                'title.min' => 'عنوان  وارد شده کوچکتر از حد مجاز است',

                'pic.required' => 'تصویر  وارد نشده است',
                'pic.min' => 'عنوان  وارد شده کوچکتر از حد مجاز است',
                'pic.file' => 'فیلد تصویر فاقد فایل تصویر است',
                

                'price.required' => 'قیمت  وارد نشده است',
                'price.min' => 'قیمت  وارد شده کوچکتر از حد مجاز است',

                'time.required' => 'زمان  وارد نشده است',
                'time.min' => 'زمان  وارد شده کوچکتر از حد مجاز است',

                'desc.required' => 'توضیحات  وارد نشده است',
                'desc.min' => 'توضیحات  وارد شده کوچکتر از حد مجاز است',

                'count.required' => 'تعداد ویدیو وارد نشده است',
                'count.min' => 'تعداد ویدیو وارد شده کوچکتر از حد مجاز است',

                'language.required' => 'زبان آموزش وارد نشده است',
                'language.min' => 'زبان آموزش  وارد شده کوچکتر از حد مجاز است',

                'subtitle.required' => 'زیرنویس  وارد نشده است',
                'subtitle.min' => 'زیرنویس  وارد شده کوچکتر از حد مجاز است',







                ];

        $validator = Validator::make($request->all(),$rules,$messages);

        return $validator ;
    }









}
