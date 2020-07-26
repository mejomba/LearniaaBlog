<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use auth;
use App\order;
use App\Package;
use App\OrderPackage;
 
class OrderController extends Controller
{
   
    public function AddPackage(Request $request)
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
                $neworderpackage = new orderpackage();
                $neworderpackage->pk_order = $new_pk_order;
                $neworderpackage->pk_package = $_POST['pk_package'];
                $package = Package::select('price')->where('pk_package',$_POST['pk_package'])->first();
                $neworderpackage->price = $package->price;
                $neworderpackage->count = $_POST['count'];
                $total = (int)$package->price * (int)$_POST['count'];
                $neworderpackage->Total_price = $total;
                $neworderpackage->save();

            }elseif($order != null)
            {
                $neworderpackage = new orderpackage();
                $pk = order::select('pk_order')->where('pk_user',$_POST['pk_user'])->first();
                $neworderpackage->pk_order = $pk->pk_order;
                $neworderpackage->pk_package = $_POST['pk_package'];
                $package = Package::select('price')->where('pk_package',$_POST['pk_package'])->first();
                $neworderpackage->price = $package->price;
                $neworderpackage->count = $_POST['count'];
                $total = (int)$package->price * (int)$_POST['count'];
                $neworderpackage->Total_price = $total;
                $neworderpackage->save();

            }

    }


    public function RemovePackage($pk,$pk_package)
    { 
         $data_order = Order::select('pk_order')->where('pk_user',$pk)->first();
        $data_package = Orderpackage::select('pk_orderpackage')
        ->where([
            'pk_package'=> $pk_package,
            'pk_order' => $data_order->pk_order
        ])->first();
  
        $orderpackage = Orderpackage::find($data_package->pk_orderpackage);
        $deleted =   $orderpackage->delete();
     
        $more_item_availibe = Orderpackage::where('pk_order',$data_order->pk_order)->count();
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
        
        $neworder = new orderpackage();
        $neworder->pk_order=$order->pk_order;
        $neworder->pk_package='0000';
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
    public function showorder(Request $request)
    {
       $user = auth::user();
       $order = order::where([
           'pk_user'=>$_POST['pk_user'],
           'status_transaction'=>'تکمیل نشده'])->first();
       $orderpackage = orderpackage::where([
           'pk_order'=>$order->pk_order,
           ])->get();
       return response()->json(['packages' => $orderpackage,'order'=>$order]);
   
    }
}
