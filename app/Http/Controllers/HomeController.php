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

class HomeController extends Controller
{
     
        public function index()
        {
            /// Not Redirect

           // return redirect(route('post.index'));


          // Make Your Data Page & Select Your View For Show Landing Page
          // Copy & Paste All of Code PostController.Index into Method

                 $recent_post = Post::where('status', 'انتشار')->orderBy('pk_post', 'desc')->get()->take(6);
                $categoryOfPage = "All";
                return view('site.post.index',compact('recent_post','categoryOfPage'));
        
        }

        public function show_contactus()
        {
          return view('site.Contactus');
        
        }
        public function show_Aboutus()
        {
          return view('site.Aboutus');
        
        }

}
