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
        $recent_post = Post::get()->take(6);
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

    public function search(Request $request)
    {
        if( request()->type_search == null)
        {
            return view('site.post.index');
        }
        elseif(request()->type_search == "post")
        {
                    $result_data =  Post::where('title', 'LIKE', '%'.request()->content_search.'%')->where('status', 'انتشار')->get();

                    if($result_data->count() == 0)
                    {
                        $recent_post = Post::get()->take(6);
                        
                        return view('site.post.index',compact('recent_post'));
                    }
                    else
                    {
                        $recent_post = $result_data ;
                        
                        return view('site.post.index',compact('recent_post'));   
                    }

         
        }
        elseif(request()->type_search == "product")
        {
            $result_data =  Product::where('title', 'LIKE', '%'.request()->content_search.'%')->where('status', 'انتشار')->get();

          if($result_data->count() == 0)
          {
            $recent_Products = Product::get()->take(6);
            $categories = Category::where('type','محصول')->get();
            
            return view('site.product.index',compact('recent_Products','categories'));
          }
          else
          {
            $recent_Products = $result_data ;
            $categories = Category::where('type','محصول')->get();
            
            return view('site.product.index',compact('recent_Products','categories'));   
          }
        }

    }
}