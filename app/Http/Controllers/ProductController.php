<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recent_product = product::where('status', 'انتشار')->get()->take(9);
      
        // dd(json_decode($recent_post[0]['extras'],false));
        return view('site.product.index',compact('recent_product'));
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
    public function show($slug)
    {  
        $detail_post = Post::where('pk_post', $slug)->get();
        $recent_product = product::get()->take(6);
        $behavior_product= Behavior::where('pk_product', $slug)->where('status','تایید شده')->get();
        /*
        
       // $tags = Tag::all();
 
        $comments = Comment::where('post_id', $post->id)->get();
   
        $category = Category::find($post->category_id);
        $relatedPosts = $category->posts()->get();
        return view('postDetail',compact('post','tags','relatedPosts','comments'));
        */
        return view('site.product.detail',compact('recent_product','behavior_product'));
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
