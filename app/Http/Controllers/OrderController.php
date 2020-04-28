<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use auth;
use App\order;
use App\Product;
use App\OrderProduct;
 
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
        if (auth::check)
        {   
            $user = auth::user();
            
            $order = order::where('pk_user',$user->pk_user)->orwhere('status_transaction','تکمیل نشده')->first();
            if ($order == null)
            {
                $neworder = new order();
                $neworder->status_transaction = 'تکمیل نشده';
                $neworder->pk_user = $user->pk_user;
                $product = new product();
                $neworder->save();
                $neworderproduct = new orderproduct();
                $neworderproduct->pk_order = $neworder ->pk_order;
                $neworderproduct->pk_product = $product->pk_product;
                $neworderproduct->price = $product->price;
                $neworderproduct->count = $product->count;
                $neworderproduct->pk_orderProduct += 1; 
                $total = $product->price * $product->count;
                $neworderproduct->Total_price = $total;
                $neworderproduct->save();

            }elseif($order != null)
            {
                $user = auth::user();
                $product = new product();
                $neworderproduct = new orderproduct();
                $neworderproduct->pk_order = $user->pk_user;
                $neworderproduct->pk_product = $product->pk_product;
                $neworderproduct->price = $product->price;
                $neworderproduct->count = $product->count;
                $pk_orderProduct = orderproduct::select('pk_orderProduct')->orderby('pk_orderProduct')->first();
                $neworderproduct->pk_orderProduct = $pk_orderProduct + 1; 
                $total = $product->price * $product->count;
                $neworderproduct->Total_price = $total;
                $neworderproduct->save();

            }

        }else
        {

        }
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
