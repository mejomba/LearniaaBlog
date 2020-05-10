<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use auth;
use App\order;
use App\Product;
use App\OrderProduct;
 
class OrderController extends Controller
{
   
    public function AddProduct(Request $request)
    {
            $order = order::where([
                                    'pk_user' => $_POST['pk_user'],
                                    'status_transaction' => 'تکمیل نشده',
                                ])->first();

            if ($order == null)
            {
                $neworder = new order();
                $neworder->status_transaction = 'تکمیل نشده';
                $neworder->pk_user = $_POST['pk_user'];
                $new_pk_order = rand(0,999999999);
                $neworder->pk_order = $new_pk_order;
                $neworder->type_Delivery = 'دانلودی';
                $neworder->save();
                $neworderproduct = new orderproduct();
                $neworderproduct->pk_order = $new_pk_order;
                $neworderproduct->pk_product = $_POST['pk_product'];
                $product = Product::select('price')->where('pk_product',$_POST['pk_product'])->first();
                $neworderproduct->price = $product->price;
                $neworderproduct->count = $_POST['count'];
                $total = (int)$product->price * (int)$_POST['count'];
                $neworderproduct->Total_price = $total;
                $neworderproduct->save();

            }elseif($order != null)
            {
                $neworderproduct = new orderproduct();
                $pk = order::select('pk_order')->where('pk_user',$_POST['pk_user'])->first();
                $neworderproduct->pk_order = $pk->pk_order;
                $neworderproduct->pk_product = $_POST['pk_product'];
                $product = Product::select('price')->where('pk_product',$_POST['pk_product'])->first();
                $neworderproduct->price = $product->price;
                $neworderproduct->count = $_POST['count'];
                $total = (int)$product->price * (int)$_POST['count'];
                $neworderproduct->Total_price = $total;
                $neworderproduct->save();

            }

    }


    public function RemoveProduct($pk,$pk_product)
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



    public function AddPhisicalDelivery(Request $request)
    {
        $order = order::select('pk_order')->where(
            ['pk_user'=>$_POST['pk_user'],
            'status_transaction' => 'تکمیل نشده'
        ])->first();
        
        $neworder = new orderproduct();
        $neworder->pk_order=$order->pk_order;
        $neworder->pk_product='0000';
        $neworder->price='7000';
        $neworder->count='1';
        $neworder->total_price='7000';
        $neworder->save();
        
        $update= order::find($order->pk_order);
        $update->type_delivery='فیزیکی';
        $update->save();
        $delivery = [
            'price'=>'7000',
            'count' => '1',
            'totla_price' => '7000',
            'name'=>'هزینه پستی'
        ];
        return response()->json($delivery);
    }
}
