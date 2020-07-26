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
use Carbon\Carbon;
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

        
         $new_instance->pk_category = request()->pk_category ;
         $new_instance->title = request()->title ;
        
         $new_instance->content = request()->content ;
         $new_instance->status = request()->status ;

         /// process pic --> uploading And move to Web storage And Change Name And Save to $new_instance
         $new_instance->alt = request()->alt ;

         $pic = request()->file('pic_content');
         $pic_name = $pic->getClientOriginalName();
         $mimeType = $pic->getMimeType();
          if($mimeType == 'image/jpeg')
          {
            $path = Storage::putFileAs( 'post', $pic, request()->title.'.jpg');
            $new_instance->pic_content = request()->title.'.jpg' ;
          }  
          elseif($mimeType == 'image/png')
          {
            $path = Storage::putFileAs( 'post', $pic, request()->title.'.png');
            $new_instance->pic_content = request()->title.'.png' ;
          }

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
            $new_instance->metatag=json_encode($metatags);

            $author = User::select('name')->where('pk_users',request()->pk_users)->first();
            $now = Carbon::now();
            
            $schema = [
              "@context"=> "https://schema.org",
              "@type"=> "BlogPosting",
              "headline" => request()->title,
              "image_url" => Storage::url('post/'.$pic_name),
              "description" => request()->desc_short,
              "author_type" => "person",
              "author" => $author->name,
              "publisher_type" => "Organization",
              "publisher_name" => "learnia",
              "logo_type" =>"ImageObject",
              "logo_url" => "https://learniaa.com/images/Template/Circlelogo.svg",
              "datePublished" => $now->toDateString(),
              "dateModified" =>$now->toDateString()
          ];

            $new_instance->schema_markup = json_encode($schema);


            if(request()->videocheck == 'yes')
            {
              $video = 'yes';
              $new_instance->video = 'yes';
              $new_instance->address_video = request()->address_video;
              $videoschema=[
                "@context"=> "https://schema.org",
                "@type"=> "VideoObject",
                "name"=>  request()->title,
                "description"=>request()->desc_short,
                "thumbnailUrl"=> Storage::url('post/'.$pic_name),
                "uploadDate" => $now->toDateString()

              ];

              $new_instance->video_schema = json_encode($videoschema);

            }
            else
            {
              $video = 'no';
              $new_instance->video = 'no';
            }



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
        $meta=json_decode($post->metatag);
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

        return view('admin.post.edit',compact('categories','tags','post','users','Search','meta'));
        
        
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
            $meta=json_decode($post->metatag);

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
            
            $post->metatag=json_encode($meta);
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






            
             $post->pk_category = request()->pk_category ;
             $post->title = request()->title ;
            
             $post->content = request()->content ;
             $post->status = request()->status ;


             // process pic
             $pic_name =  "";
             if(request()->pic_content)
             {
                $pic = request()->file('pic_content');
                $pic_name = $pic->getClientOriginalName();
                $mimeType = $pic->getMimeType();
               if($mimeType == 'image/jpeg')
               {
                 $path = Storage::putFileAs( 'post', $pic, request()->title.'.jpg');
                 $post->pic_content = request()->title.'.jpg' ;
               }  
               elseif($mimeType == 'image/png')
               {
                 $path = Storage::putFileAs( 'post', $pic, request()->title.'.png');
                 $post->pic_content = request()->title.'.png' ;
               }
                   
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


              $author = User::select('name')->where('pk_users',request()->pk_users)->first();
              $now = Carbon::now();
              $schema = [
                  "@context"=> "https://schema.org",
                  "@type"=> "BlogPosting",
                  "headline" => request()->title,
                  "image_url" => Storage::url('post/'.$pic_name),
                  "description" => request()->desc_short,
                  "author_type" => "person",
                  "author" => $author->name,
                  "publisher_type" => "Organization",
                  "publisher_name" => "learnia",
                  "logo_type" =>"ImageObject",
                  "logo_url" => "https://learniaa.com/images/Template/Circlelogo.svg",
                  "datePublished" => request()->create_at,
                  "dateModified" =>$now->toDateString()
              ];

              if(request()->videocheck == 'yes')
              {
                $post->video = 'yes';
                $post->address_video = request()->address_video;
                $videoschema=[
                  "@context"=> "https://schema.org",
                  "@type"=> "VideoObject",
                  "name"=>  request()->title,
                  "description"=>request()->desc_short,
                  "thumbnailUrl"=> Storage::url('post/'.$pic_name),
                  "uploadDate" => $now->toDateString()
  
                ];
  
                $post->video_schema = json_encode($videoschema);
  

              }else{

                  $post->video = 'no';
  
              };
  

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
