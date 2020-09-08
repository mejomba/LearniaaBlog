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
    public function index()
    {
        $category = "عمومی";
        $offset = "1";
        if(isset($_GET['category'])) { $category = $_GET['category']; }
        if(isset($_GET['offset'])) { $offset = $_GET['offset']; }
       
        if($category == "عمومی") {$recent_post = Blog::where('status', 'انتشار')->orderby('pk_blog','DESC')->paginate(6);}   
        else
        {
            $select_category = Category::where('name', $category )->first();
            $recent_post = Blog::where(['status'=> 'انتشار' , 'pk_category' => $select_category->pk_category])
            ->whereBetween('sort_category', [$offset, $offset * 5])->orderby('pk_blog','DESC')->paginate(1);
        }
        return view('site.blog.index',compact('recent_post'));
    }


    public function show($en_title)
    {  
        $one_post = Blog::where('en_title', $en_title)->first();
        $behaviors = Behavior::where(['pk_entity'=>$one_post->pk_blog , 'type_entity'=>'پست' ])->get();
        /* $recent_post = Blog::where('status', 'انتشار')->orderBy('pk_blog', 'desc')->get()->take(6); */
        $recent_post = array();
        /* Meta Keyword */
        $data_search = Search::where('pk_search',$one_post['pk_search'])->get();
        $meta_keywords = array();
        foreach($data_search as $keyword){array_push($meta_keywords,$keyword->tag['fa_name']) ;}
        /* Meta Keyword */
        return view('site.blog.show',compact('one_post','recent_post','meta_keywords','behaviors'));
    }


}
