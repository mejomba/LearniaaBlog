<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;
use App\Category;
use Shetabit\Payment\Invoice;
use Shetabit\Payment\Facade\Payment;
use Shetabit\Payment\Exceptions\InvalidPaymentException;
use Spatie\Sitemap\SitemapGenerator;
use App\Transaction;
use App\Tag;
use App\Product;
use App\Learner;
use App\Profile;
use App\Behavior;
use Validator;

class HomeController extends Controller
{
     
        public function index()
        {
           $last_posts =  Post::select('pk_post','title','pic_content','extras')->orderby('pk_post','ASC')->take(3)->get();
          return view('site.academy.index',compact('last_posts'));
        }

        public function show_contactus()
        {
          return view('site.Contactus');
        
        }
        public function show_Aboutus()
        {
          return view('site.Aboutus');
        
        }

        public function Page500()
        {
          return view('error.500');
        }

        public function SitemapCreate()
        {
          SitemapGenerator::create('https://learniaa.com')->writeToFile('sitemap.xml');
          return redirect('https://learniaa.com/sitemap.xml');
          
        }

        public function search(Request $request)
        {
          
            if(request()->type_search == "post" )
            {
                $result_data =  Post::where('title', 'LIKE', '%'.request()->content_search.'%')->where('status', 'انتشار')->get();
    
                if($result_data->count() == 0)
                {
                    $recent_post = Post::get()->take(6);
                  
                    $categoryOfPage = "All";
                    return view('site.post.index',compact('recent_post','categoryOfPage'));
                }
                else
                {
                    $recent_post = $result_data ;
                    $categoryOfPage = "All";
                    return view('site.post.index',compact('recent_post','categoryOfPage'));   
                }
    
            }
            else /* request()->type_search == "product" || request()->type_search == null */
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
