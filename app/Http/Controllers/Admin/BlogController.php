<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Blog;
use App\Category;
use App\Tag;
use Validator;
use App\User;
use App\Search;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\File;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instance_Model_blog = new Blog();
        $names =   $instance_Model_blog->GetListAllNameColumns_ForTable();
        $blogs = Blog::orderBy('pk_blog', 'desc')->get();
       
        return view('admin.blog.index',compact('blogs','names'));
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
        $users = User::get();
        return view('admin.blog.create',compact('categories','tags','users'));
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
             $new_instance = new Blog();
    
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
    
             $new_instance->pk_writers = request()->pk_users ;
             $new_instance->pk_category = request()->pk_category ;
             $new_instance->title = request()->title ;
             $new_instance->content = request()->content ;
             $new_instance->status = request()->status ;
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
                
                $new_instance->readtime = request()->readtime ;
                $new_instance->create_at = request()->create_at ;
                $new_instance->desc_short = request()->desc_short ;
    
                // SEO Process 

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
                    return redirect(route('admin.blog.index'))->with('success','پست با موفقیت ایجاد شد ');
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
        $blog = Blog::find($id);
        $categories = Category::where('type','پست')->get();
        $meta=json_decode($blog->metatag);
        $row_Search = Search::where('pk_search', $blog->pk_search)->select('pk_tag')->get();
        $Search =array();
        foreach ($row_Search as $search){array_push($Search,$search->pk_tag);}
        $tags = Tag::where('type','پست')->get();
        $users = User::get();

        return view('admin.blog.edit',compact('categories','tags','blog','users','Search','meta'));
        
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
            $blog = Blog::find($id);
           
            if(request()->pk_tags != null)
            {    
                  foreach (request()->pk_tags as $key => $tag) 
                  {
                      $row = Search::where('pk_tag',$tag)->where('pk_search',$blog->pk_search)->first();
                      if($row == null)
                      {
                        $new_Search = new Search();
                        $new_Search->pk_search = $blog->pk_search ;
                        $new_Search->pk_type = 'پست';
                        $new_Search->pk_tag = $tag ;
                        $new_Search->save();
                      }
                  }

             }

             $blog->pk_writers = request()->pk_users ;
             $blog->pk_category = request()->pk_category ;
             $blog->title = request()->title ;
             $blog->content = request()->content ;
             $blog->status = request()->status ;

             $pic_name =  "";
             if(request()->pic_content)
             {
                $pic = request()->file('pic_content');
                $pic_name = $pic->getClientOriginalName();
                $mimeType = $pic->getMimeType();
               if($mimeType == 'image/jpeg')
               {
                 $path = Storage::putFileAs('post', $pic, request()->title.'.jpg');
                 $blog->pic_content = request()->title.'.jpg' ;
               }  
               elseif($mimeType == 'image/png')
               {
                 $path = Storage::putFileAs('post', $pic, request()->title.'.png');
                 $blog->pic_content = request()->title.'.png' ;
               }  
             }

             if(request()->pdf_content)
             {
                    $pdf = request()->file('pdf_content');
                    $pdf_name = $pdf->getClientOriginalName();
                    $path = Storage::putFileAs( 'pdf', $pdf, $pdf_name);
                    $blog->pdf_content = $pdf_name ;
             }

             $blog->readtime = request()->readtime ;
             $blog->create_at = request()->create_at ;
             $blog->desc_short = request()->desc_short ;



              $meta=json_decode($blog->metatag);

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
              
              $blog->metatag=json_encode($meta);


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
                $blog->video = 'yes';
                $blog->address_video = request()->address_video;
                $videoschema=[
                  "@context"=> "https://schema.org",
                  "@type"=> "VideoObject",
                  "name"=>  request()->title,
                  "description"=>request()->desc_short,
                  "thumbnailUrl"=> Storage::url('post/'.$pic_name),
                  "uploadDate" => $now->toDateString()
  
                ];
                $blog->video_schema = json_encode($videoschema);
              }
              else{ $blog->video = 'no';  };

            if(  $blog->save())
            {
                return redirect(route('admin.blog.index'))->with('success','پست با موفقیت ویرایش شد ');
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
      $blog = Blog::find($id);
    
      if($blog->delete())
      {
          return redirect(route('admin.blog.index'))->with('success','پست با موفقیت حذف شد ');
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
                    'title' => 'required|min:3', 
                    'content' => 'required|min:3',
                    'pic_content' => 'image|mimes:jpeg,png,jpg,gif,svg|nullable',
                    'pdf_content' => 'file|nullable|mimetypes:application/pdf',
                    'status' => 'required',
                    'pk_tags' => 'required',
                    
                 ];

    $messages = [ 
      
                'pk_category.required' => 'دسته بندی وارد نشده است',
                'pk_category.numeric' => 'دسته بندی  صحیح نمی باشد',
                'title.required' => 'عنوان  وارد نشده است',
                'title.min' => 'عنوان  کوتاه تر از حد مجاز وارد شده است',
                'content.required' => 'محتوا  وارد نشده است',
                'content.min' => 'محتوا کوتاه تر از حد مجاز وارد شده است',
                'pdf_content.file' => 'فایل پی دی اف  صحیح وارد نشده است',
                'pdf_content.mimetypes' => 'فایل پی دی اف  صحیح وارد نشده است',
                'pic_content.image' => 'تصویر شاخص  صحیح وارد نشده است',
                'pic_content.mimes' => 'فرمت تصویر شاخص  صحیح وارد نشده است',
                'status.required' => 'وضعیت  وارد نشده است',
                'pk_tags.required' => 'تگ  وارد نشده است',
                ];

        $validator = Validator::make($request->all(),$rules,$messages);

        return $validator ;
    }


    public function upload(Request $request)
    {
            if($request->hasFile('upload')) 
            {
              $pic = request()->file('upload');
              $pic_name = $pic->getClientOriginalName();
              $path = Storage::putFileAs( 'post', $pic, $pic_name);
              $url2 = Storage::url('post/'.$pic_name);
              $CKEditorFuncNum = $request->input('CKEditorFuncNum');
              $url =   $url2 ;  
              $msg = 'تصویر با موفقیت اپلود شد';                 
              @header('Content-type: text/html; charset=utf-8');
              return   $response = [
                "uploaded" => 1,
                "filename" =>  $pic_name,
                "url" => $url,
                "error" => $msg
                ];
          }
    }

}
