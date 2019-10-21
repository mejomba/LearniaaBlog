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
        return redirect(route('post.index'));
        
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
