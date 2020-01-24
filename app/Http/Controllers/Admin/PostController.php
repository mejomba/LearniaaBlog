<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use App\Tag;
use Validator;
use App\User;
use App\Search;
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
          $posts = Post::orderBy('pk_post', 'desc')->orderBy('pk_post', 'desc')->get();
        }
        else
        {
          $posts = Post::where('pk_writers', $user->pk_users)->orderBy('pk_post', 'desc')->get();
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
        $user =  Auth::user() ;
        $categories = Category::where('type','پست')->get();

       
        if($user->type == 'مدیر')
        {
          $tags = Tag::where('type','پست')->get();
        }
        else
        {
          $tags = Tag::where('type','پست')->where('pk_users',$user->pk_users)->get();
        }

        // list writers User For Admin
        $users = User::get();


        return view('admin.post.create',compact('categories','tags','users'));
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
                $pk_search = uniqid(); 
                
                foreach (request()->pk_tags as $key => $tag) 
                {
                  $new_Search = new Search();
                  $new_Search->pk_search = $pk_search ;
                  $new_Search->pk_type = 'پست';
                  $new_Search->pk_tag = $tag ;
                  $new_Search->save();
                }

                $new_instance->pk_search =  $pk_search ;
            }

             // process User --> Get info Writer And Save $new_instance
             $user =  Auth::user() ;

             if($user->type == 'مدیر')
             {
              $new_instance->pk_writers = request()->pk_users ;
             }
             else
             {
              $new_instance->pk_writers =  $user->pk_users ;
             }

        
         $new_instance->pk_categories = request()->pk_categories ;
         $new_instance->title = request()->title ;
        
         $new_instance->content = request()->content ;
         $new_instance->status = request()->status ;

         /// process pic --> uploading And move to Web storage And Change Name And Save to $new_instance

         $pic = request()->file('pic_content');
         $pic_name = $pic->getClientOriginalName();
         $path = Storage::putFileAs( 'post', $pic, $pic_name);
         $new_instance->pic_content = $pic_name ;

         if(request()->pdf_content)
         {
                $pdf = request()->file('pdf_content');
                $pdf_name = $pdf->getClientOriginalName();
                $path = Storage::putFileAs( 'pdf', $pdf, $pdf_name);
                $new_instance->pdf_content = $pdf_name ;
         }


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
        $user =  Auth::user() ;
        $post = Post::find($id);
        $categories = Category::where('type','پست')->get();

        $row_Search = Search::where('pk_search', $post->pk_search)->select('pk_tag')->get();
        $Search =array();
        foreach ($row_Search as $search)
        {
          
          array_push($Search,$search->pk_tag);
        }

        if($user->type == 'مدیر')
        {
          $tags = Tag::where('type','پست')->get();
        }
        else
        {
          $tags = Tag::where('type','پست')->where('pk_users',$user->pk_users)->get();
        }

             // list writers User For Admin
             $users = User::get();

        return view('admin.post.edit',compact('categories','tags','post','users','Search'));
        
        
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
            // Get Selected Item From DB  
            $post = Post::find($id);

            //process
            if(request()->pk_tags != null)
            {    
                  foreach (request()->pk_tags as $key => $tag) 
                  {
                      $row = Search::where('pk_tag',$tag)->where('pk_search',$post->pk_search)->first();
                      if($row == null)
                      {
                        $new_Search = new Search();
                        $new_Search->pk_search = $post->pk_search ;
                        $new_Search->pk_type = 'پست';
                        $new_Search->pk_tag = $tag ;
                        $new_Search->save();
                      }
                  }

             }

             

            // process User --> Get info Writer And Save $new_instance
                $user =  Auth::user() ;

                if($user->type == 'مدیر')
                {
                $post->pk_writers = request()->pk_users ;
                }
                else
                {
                $post->pk_writers =  $user->pk_users ;
                }






            
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

             if(request()->pdf_content)
             {
                    $pdf = request()->file('pdf_content');
                    $pdf_name = $pdf->getClientOriginalName();
                    $path = Storage::putFileAs( 'pdf', $pdf, $pdf_name);
                    $post->pdf_content = $pdf_name ;
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
                    'content' => 'required|min:3',
                    'pic_content' => 'image|mimes:jpeg,png,jpg,gif,svg|nullable',
                    'pdf_content' => 'file|nullable|mimetypes:application/pdf',
                    'status' => 'required',
                 ];

    $messages = [ 
      
                'pk_categories.required' => 'دسته بندی وارد نشده است',
                'pk_categories.numeric' => 'دسته بندی  صحیح نمی باشد',
                'title.required' => 'عنوان  وارد نشده است',
                'title.min' => 'عنوان  کوتاه تر از حد مجاز وارد شده است',
                'content.required' => 'محتوا  وارد نشده است',
                'content.min' => 'محتوا کوتاه تر از حد مجاز وارد شده است',
                'pdf_content.file' => 'فایل پی دی اف  صحیح وارد نشده است',
                'pdf_content.mimetypes' => 'فایل پی دی اف  صحیح وارد نشده است',
                'pic_content.image' => 'تصویر شاخص  صحیح وارد نشده است',
                'pic_content.mimes' => 'فرمت تصویر شاخص  صحیح وارد نشده است',
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
