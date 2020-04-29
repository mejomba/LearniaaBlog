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
        //if (auth::check())
        //{   
            $user = auth::user();
            
            $order = order::where([
                'pk_user' => $_POST['pk'],
                'status_transaction' => 'تکمیل نشده',
            ])->first();



            if ($order == null)
            {
                $neworder = new order();
                $neworder->status_transaction = 'تکمیل نشده';
                $neworder->pk_user = $_POST['pk'];
                $new_pk_order = rand(0,999999999);
                $neworder->pk_order = $new_pk_order;
                $neworder->save();
                $neworderproduct = new orderproduct();
                $neworderproduct->pk_order = $new_pk_order;
                $neworderproduct->pk_product = $_POST['pk_product'];
                $product = Product::select('price')->where('pk_product',$_POST['pk_product'])->first();
                $neworderproduct->price = $product->price;
                $neworderproduct->count = $_POST['count'];
               // $neworderproduct->pk_orderProduct += 1; 
                $total = (int)$product->price * (int)$_POST['count'];
                $neworderproduct->Total_price = $total;
                $neworderproduct->save();

            }elseif($order != null)
            {
              //  $user = auth::user();
               // $product = new product();
                $neworderproduct = new orderproduct();
                $pk = order::select('pk_order')->where('pk_user',$_POST['pk'])->first();
                $neworderproduct->pk_order = $pk->pk_order;
                $neworderproduct->pk_product = $_POST['pk_product'];
                $product = Product::select('price')->where('pk_product',$_POST['pk_product'])->first();
                $neworderproduct->price = $product->price;
                $neworderproduct->count = $_POST['count'];
                //$pk_orderProduct = orderproduct::select('pk_orderProduct')->orderby('pk_orderProduct')->first();
              //  $neworderproduct->pk_orderProduct = $pk_orderProduct + 1; 
                $total = (int)$product->price * (int)$_POST['count'];
                $neworderproduct->Total_price = $total;
                $neworderproduct->save();

            }

        /*}else
        {

        }*/
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
    public function destroy($pk,$pk_product)
    {
        
        $data_order = Order::select('pk_order')->where('pk_user',$pk)->first();

        $data_product = Orderproduct::select('pk_orderproduct')
        ->where([
            'pk_product'=> $pk_product,
            'pk_order' => $data_order->pk_order
        ])->first();
  
        $orderproduct = Orderproduct::find($data_product->pk_orderproduct);
        $deleted =   $orderproduct->delete();
     
        $more_item_availibe = Orderproduct::where('pk_order',$data_order->pk_order)->count();
        if($more_item_availibe ==  0)
        {
          $order = Order::find($data_order->pk_order);
          $del = $order->delete();
        }
      
        return response()->json("Deleted OK");
        
    }
}
