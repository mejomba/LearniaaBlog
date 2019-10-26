<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use App\Tag;
use Validator;
use Auth;
use Illuminate\Http\File;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instance_Model_post = new Post();
        $names =   $instance_Model_post->GetListAllNameColumns_ForTable();


        $user =  Auth::user() ;
        if($user->type == 'مدیر')
        {
          $posts = Post::get();
        }
        else
        {
          $posts = Post::where('pk_writers', $user->pk_users)->get();
        }

        return view('admin.post.index',compact('posts','names'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('type','پست')->get();
        $tags = Tag::where('type','پست')->get();
        return view('admin.post.create',compact('categories','tags'));
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
         $new_instance = new Post();

         if(request()->pk_tags != null)
          {  
            $data_tags = json_encode(request()->pk_tags,false);  
            $new_instance->pk_tags =  $data_tags ;
           }

             // process User --> Get info Writer And Save $new_instance
             $user =  Auth::user() ;
             $new_instance->pk_writers =  $user->pk_users ;
        
         $new_instance->pk_categories = request()->pk_categories ;
         $new_instance->title = request()->title ;
        
         $new_instance->content = request()->content ;
         $new_instance->status = request()->status ;

         /// process pic --> uploading And move to Web storage And Change Name And Save to $new_instance

         $pic = request()->file('pic_content');
         $pic_name = $pic->getClientOriginalName();
         $path = Storage::putFileAs( 'post', $pic, $pic_name);
         $new_instance->pic_content = $pic_name ;


            // process extras --> save all option to array And save to $new_instance
            $data_extras = array();

            if(request()->readtime)
              { 
                $data_extras["readtime"] =  request()->readtime  ;
                
              }
 
            if(request()->create_at) 
             {   
                $data_extras["create_at"] =  request()->create_at  ;
             }

             if(request()->create_at) 
             {   
                $data_extras["desc_short"] =  request()->desc_short  ;
             }

              
             if($data_extras != null)
             {
                 $new_instance->extras =  json_encode($data_extras,false) ;
             }

           // Save To database 

            if(  $new_instance->save())
            {
                return redirect(route('admin.post.index'))->with('success','پست با موفقیت ایجاد شد ');
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
        $post = Post::find($id);
        $categories = Category::where('type','پست')->get();
        $tags = Tag::where('type','پست')->get();
        return view('admin.post.edit',compact('categories','tags','post'));
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
            $post = Post::find($id);

            //process
            if(request()->pk_tags != null)
            {  
              $data_tags = json_encode(request()->pk_tags,false);  
              $post->pk_tags =  $data_tags ;
             }
             else
             {
               $post->pk_tags =  "" ;
             }

             $user =  Auth::user() ;
             $post->pk_writers =  $user->pk_users ;
            
             $post->pk_categories = request()->pk_categories ;
             $post->title = request()->title ;
            
             $post->content = request()->content ;
             $post->status = request()->status ;


             // process pic

             if(request()->pic_content)
             {
                    $pic = request()->file('pic_content');
                    $pic_name = $pic->getClientOriginalName();
                    $path = Storage::putFileAs( 'post', $pic, $pic_name);
                    $post->pic_content = $pic_name ;
             }

             $data_extras = array();

             if(request()->readtime)
               { 
                 $data_extras["readtime"] =  request()->readtime  ;
                 
               }
  
             if(request()->create_at) 
              {   
                 $data_extras["create_at"] =  request()->create_at  ;
              }
 
              if(request()->create_at) 
              {   
                 $data_extras["desc_short"] =  request()->desc_short  ;
              }
 
               
              if($data_extras != null)
              {
                $post->extras =  json_encode($data_extras,false) ;
              }

               // Save To database 

            if(  $post->save())
            {
                return redirect(route('admin.post.index'))->with('success','پست با موفقیت ویرایش شد ');
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
      $post = Post::find($id);
    
      if($post->delete())
      {
          return redirect(route('admin.post.index'))->with('success','پست با موفقیت حذف شد ');
      }
      else
      {
          return redirect()->back()->with('report',' خطا : مشکل درعملیات پایگاه داده');
      }

    }




    public function validation(Request $request)
    {

        $rules =  [
                    'pk_categories' => 'required|numeric', 
                    'title' => 'required|min:3', 
                    'title' => 'required|min:3',
                    'content' => 'required|min:3',
                    'pic_content' => 'file|nullable',
                    'status' => 'required',
                 ];

    $messages = [
                'pk_categories.required' => 'دسته بندی وارد نشده است',
                'pk_categories.numeric' => 'دسته بندی  صحیح نمی باشد',
                'title.required' => 'عنوان  وارد نشده است',
                'title.min' => 'عنوان  کوتاه تر از حد مجاز وارد شده است',
                'content.required' => 'محتوا  وارد نشده است',
                'content.min' => 'محتوا کوتاه تر از حد مجاز وارد شده است',
                
                'pic_content.file' => 'تصویر شاخص  صحیح وارد نشده است',
                'status.required' => 'وضعیت  وارد نشده است',
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
              $request->file('upload')->move(public_path('images'), $fileName);
              */

              $pic = request()->file('upload');
              $pic_name = $pic->getClientOriginalName();
              $path = Storage::putFileAs( 'post', $pic, $pic_name);

              $url2 = Storage::url('post/'.$pic_name);
               
         

              $CKEditorFuncNum = $request->input('CKEditorFuncNum');
          /*    $url = 'https://5c76fd66bf6fa1001152cbea.storage.liara.ir/post/'.$pic_name; */
              $url =   $url2 ;  
              $msg = 'تصویر با موفقیت اپلود شد'; 
           //   $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
                
              @header('Content-type: text/html; charset=utf-8');

              return   $response = [
                "uploaded" => 1,
                "filename" =>  $pic_name,
                "url" => $url,
                "error" => $msg
                ];


              
            //  return $response;
          }
    }


}
