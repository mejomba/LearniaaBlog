<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Routing;
use Validator;
use Auth;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class RoutingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* Security Admin Panel */
        if(Auth::user()->type != 'مدیر'){ return redirect()->back(); }
        /* Security Admin Panel */        
        $Model = new Routing();
        $names =   $Model->GetListAllNameColumns_ForTable();
        $routing = Routing::get();
        return view('admin.routing.index',compact('routing','names'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.routing.create');

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
        $new_route = new Routing();
        $new_route->location_user_id = request()->location_id;
        $new_route->type_question = request()->type_question;
        $new_route->question = request()->question;
        $new_route->content = request()->content;
        $feedback = [];
        $feedback = array_merge($feedback,request()->feedback);
        $feedkey = [];
        $feedkey = array_merge($feedkey,request()->feedkey);
        $feedradepa = [];
        $feedradepa = array_merge($feedradepa,request()->feedradepa);
        $answers = [];
        foreach($feedkey as $item => $value)
        {
            //$answers[$value] = $feedback[$item];
            $feeds = ['key' => $value , 'caption' =>$feedback[$item],'radepa' => $feedradepa[$item]];
            $answers[$item] = $feeds;
        }
        $feed = json_encode($answers);
        $new_route->feedback = $feed;   
        if(  $new_route->save())
        {
            return redirect(route('admin.routing.index'))->with('success','مسیر با موفقیت ایجاد شد ');
        }
        else
        {
            return redirect()->back()->with('report',' خطا : مشکل درعملیات پایگاه داده');
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
        $route = Routing::find($id);
        $feedback = json_decode($route->feedback);
        return view('admin.routing.edit',compact('route','feedback'));

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
        $new_route = Routing::find($id);

        $new_route->location_user_id = request()->location_id;
        $new_route->type_question = request()->type_question;
        $new_route->question = request()->question;
        $new_route->content = request()->content;
        //dd(request()->feedback);
        $feedback = [];
        $feedback = array_merge($feedback,request()->feedback);
        $feedkey = [];
        $feedkey = array_merge($feedkey,request()->feedkey);
        $feedradepa = [];
        $feedradepa = array_merge($feedradepa,request()->feedradepa);
        foreach($feedkey as $item => $value)
        {
            $feeds = ['key' => $value , 'caption' =>$feedback[$item],'radepa' => $feedradepa[$item]];
            $answers[$item] = $feeds;   
        }
       
        $feed = json_encode($answers);
        $new_route->feedback = $feed;   
        if(  $new_route->save())
        {
            return redirect(route('admin.routing.index'))->with('success','مسیر با موفقیت بروز رسانی شد ');
        }
        else
        {
            return redirect()->back()->with('report',' خطا : مشکل درعملیات پایگاه داده');
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
        $route = Routing::find($id);
    
        if($route->delete())
        {
            return redirect(route('admin.routing.index'))->with('success','مسیر با موفقیت حذف شد ');
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
              $mimeType = $pic->getMimeType();
              $pic_name = uniqid();
            
             if($mimeType == 'image/jpeg')
             {
               $path = Storage::putFileAs( 'routing', $pic, $pic_name.'.jpg');
               $pic_name = $pic_name.'.jpg' ;
             }  
             elseif($mimeType == 'image/png')
             {
               $path = Storage::putFileAs( 'routing', $pic, $pic_name.'.png');
               $pic_name =  $pic_name.'.png' ;
             }

              $url2 = Storage::url('routing/'.$pic_name);
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
