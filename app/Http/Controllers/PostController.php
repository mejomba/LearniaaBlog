<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\Category;
use App\Behavior;
use App\Product;


class PostController extends Controller
{
     public function index()
    {
      $recent_post = Post::where('status', 'انتشار')->orderBy('pk_post', 'desc')->get()->take(6);
      $categoryOfPage = "All";
       return view('site.post.index',compact('recent_post','categoryOfPage'));
       
    }
    public function detail($slug,$desc)
    {  
        $detail_post = Post::where('pk_post', $slug)->get();
        $recent_post = Post::where('status', 'انتشار')->orderBy('pk_post', 'desc')->get()->take(6);
        $behavior_post = Behavior::where('pk_entity', $slug)->where('status','تایید شده')->get();
       
        return view('site.post.detail',compact('detail_post','recent_post','behavior_post'));
    }
    /*
    public function postByTag($slug)
    {
           $tag = Tag::where('slug', $slug)->first();
           $posts = $tag->posts()->get();
           return view('index',compact('posts')) ; 
    }
    */

    public function postByCategory($name)
    {
        $category = Category::where('name', $name)->first();
        $pk_categories = $category['pk_categories'];
        $recent_post = Post::where('pk_categories', $pk_categories)->where('status', 'انتشار')->get()->take(6);
        $categoryOfPage =   $pk_categories;
       
        return view('site.post.index',compact('recent_post','categoryOfPage'));
    }


}