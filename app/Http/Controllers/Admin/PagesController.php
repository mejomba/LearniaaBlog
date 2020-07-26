<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pages;
use Validator;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $instance_Model_order = new Pages();
        $names =   $instance_Model_order->GetListAllNameColumns_ForTable();
        $pages = Pages::get();
        return view('admin.Pages.index',compact('pages','names')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.Pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
        $validator =  $this->validation($request);

        if ($validator->fails())
        {
             return redirect()->back()
                         ->withErrors($validator)
                         ->withInput();
       }
 
     else
       {

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
        $pages = new Pages();        
        $pages->id_page=request()->id_page;
        $pages->eng_name=request()->eng_name;
        $pages->farsi_name=request()->farsi_name;
        $pages->data=request()->data;
        $pages->metatag=json_encode($metatags);
        if(  $pages->save())
        {
            return redirect(route('admin.pages.index' ))->with('success','برگه با موفقیت ایجاد شد ');
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
        //
        $pages = Pages::find($id);
        $meta=json_decode($pages->metatag);
        return view('admin.Pages.edit',compact('pages','meta')); 

        
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
        //
        $validator =  $this->validation($request);

        if ($validator->fails())
        {
             return redirect()->back()
                         ->withErrors($validator)
                         ->withInput();
       }
 
     else
       {
        $pages = Pages::find($id);
        $meta=json_decode($pages->metatag);

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
        
        $pages->metatag=json_encode($meta);


        $pages->id_page=request()->id_page;
        $pages->eng_name=request()->eng_name;
        $pages->farsi_name=request()->farsi_name;
        $pages->data=request()->data;
        if(  $pages->save())
        {
            return redirect(route('admin.pages.index' ))->with('success','برگه با موفقیت ثبت شد ');
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
        $pages = Pages::find($id);
        if($pages->delete())
        {
            return redirect(route('admin.pages.index'))->with('success','برگه با موفقیت حذف شد ');
        }
        else
        {
            return redirect()->back()->with('report',' خطا : مشکل درعملیات پایگاه داده');
        }
    }

    public function validation(Request $request)
    {

        $rules =  [
                    'id_page' => 'required|numeric', 
                    'eng_name' => 'required',
                    'farsi_name' => 'required',
                    'data' => 'required',
                 ];

    $messages = [
      
        
                'id_page.required' => 'آیدی برگه وارد نشده است',
                'id_page.numeric' => 'ایدی برگه صحیح وارد نشده است ',
                'eng_name.required' => 'نام انگلیسی وارد نشده است',
                'farsi_name.required' => 'نام فارسی  وارد نشده است',
                'data.required' => 'محتوا  وارد نشده است',
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
              $path = Storage::putFileAs( 'page', $pic, $pic_name);
              $url2 = Storage::url('page/'.$pic_name);


              $CKEditorFuncNum = $request->input('CKEditorFuncNum');
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
}
