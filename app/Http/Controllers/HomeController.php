<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Shetabit\Payment\Invoice;
use Shetabit\Payment\Facade\Payment;
use Shetabit\Payment\Exceptions\InvalidPaymentException;
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
            /// Not Redirect

           // return redirect(route('post.index'));


          // Make Your Data Page & Select Your View For Show Landing Page
          // Copy & Paste All of Code PostController.Index into Method

            // 
            $recent_Products = Product::where('status', 'انتشار')->get()->take(9);
            $categories = Category::where('type','محصول')->get();
            return view('site.product.index',compact('categories','recent_Products'));
        
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

}
