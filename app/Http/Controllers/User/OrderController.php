<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use auth;
use App\Order;
class OrderController extends Controller
{
    //
    public function index(Request $request)
    {
        /* Security Admin Panel */
        
        /* Security Admin Panel */        
        $instance_Model_order = new Order();
        $names =   $instance_Model_order->GetListAllNameColumns_ForTable();
        $orders = Order::where('pk_user',auth::user()->pk_user);
        return view('user.order.index',compact('orders','names')); 
    }

}
