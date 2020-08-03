<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Category;
use App\Behavior;
use App\Package;
use App\Search;
use App\Blog;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = "عمومی";
        $offset = "1";
        if(isset($_GET['category'])) { $category = $_GET['category']; }
        if(isset($_GET['offset'])) { $offset = $_GET['offset']; }
       
        if($category == "عمومی")
        {
           // $recent_post = Blog::where('status', 'انتشار')->orderBy('pk_blog', 'desc')->get()->take(6);

            $recent_post = Blog::where('status', 'انتشار')->whereBetween('sort_general', [$offset, $offset * 5])->get();
           
        }
        else
        {
            $select_category = Category::where('name', $category )->first();
            $recent_post = Blog::where(['status'=> 'انتشار' , 'pk_category' => $select_category->pk_category])
            ->whereBetween('sort_category', [$offset, $offset * 5])->get();
        }


        
        return view('site.blog.index',compact('recent_post'));
    }


    public function detail($slug,$desc)
    {  
        $one_post = Blog::where('pk_blog', $slug)->first();
        $recent_post = Blog::where('status', 'انتشار')->orderBy('pk_blog', 'desc')->get()->take(6);

        /* Meta Keyword */
        $data_search = Search::where('pk_search',$one_post['pk_search'])->get();
        $meta_keywords = array();
        foreach($data_search as $keyword)
        {
            array_push($meta_keywords,$keyword->tag['fa_name']) ;
        }
         /* Meta Keyword */
        
        return view('site.blog.show',compact('one_post','recent_post','meta_keywords'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }
}