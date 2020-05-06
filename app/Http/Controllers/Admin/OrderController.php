<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
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
        $instance_Model_order = new Order();
        $names =   $instance_Model_order->GetListAllNameColumns_ForTable();
        $orders = Order::get();
        return view('admin.order.index',compact('orders','names')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.order.create'); 

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $neworder = new order();
        $new_pk_order = rand(0,999999999);
        $neworder->pk_order = $new_pk_order;
        $neworder->pk_Transportation = request()->pk_Transportation;  
        $neworder->status_transaction = request()->status_transaction;
        $neworder->pk_user = request()->pk_user;
        $neworder->Use_DiscountCode  = request()->Use_DiscountCode;
        $neworder->DiscountCode  = request()->DiscountCode;
        $neworder->type_Delivery = request()->status_transaction;
        if($neworder->save())
        {
            return redirect(route('admin.order.index'))->with('success','ُسبد با موفقیت ایجاد شد ');
        }
        else
        {
            return redirect()->back()->with('report',' خطا : مشکل درعملیات پایگاه داده');
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
        $order = order::find($id);
        $orderproduct = orderproduct::where('pk_order',$order->pk_order)->get();
        $instance_Model_order = new orderproduct();
        $names =   $instance_Model_order->GetListAllNameColumns_ForTable();
        return view('admin.order.show',compact('orderproduct','order','names')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);
        return view('admin.order.edit',compact('order')); 
        
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
        $order = Order::find($id);
        $order ->pk_Transportation = request()->pk_Transportation;
        $order ->status_transaction   = request()->status_transaction;
        $order ->Use_DiscountCode  = request()->Use_DiscountCode;
        $order ->DiscountCode  = request()->DiscountCode;
        $order ->type_deliver = request()->type_deliver;
        if($order->save())
            {
                return redirect(route('admin.order.index'))->with('success','ُسبد با موفقیت ویرایش شد ');
            }
            else
            {
                return redirect()->back()->with('report',' خطا : مشکل درعملیات پایگاه داده');
            }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);
        
            if($order->delete())
            {
                return redirect(route('admin.order.index'))->with('success','ُسبد با موفقیت حذف شد ');
            }
            else
            {
                return redirect()->back()->with('report',' خطا : مشکل درعملیات پایگاه داده');
            }
    }
    public function orderproductedit($key,$id)
    {
        $order = order::find($key);
        $orderproduct = orderproduct::where([
            'pk_order'=>$order->pk_order,
            'pk_orderproduct'=>$id
            ])->first();

            return view('admin.order.orderproductedit',compact('orderproduct','order')); 
    }

    public function orderproductupdate($key,$id)
    {
        $order = order::find($key);
        $orderproduct = orderproduct::where([
            'pk_order'=>$order->pk_order,
            'pk_orderproduct'=>$id
            ])->first();
        $orderproduct ->pk_prdocut  = request()->pk_prdocut ;
        $orderproduct ->price    = request()->price ;
        $orderproduct ->count   = request()->count ;
        $orderproduct ->Total_price   = request()->Total_price ;
        $orderproduct ->Use_DiscountCode  = request()->Use_DiscountCode ;
        $orderproduct ->DiscountCode   = request()->DiscountCode ;
        if($orderproduct->save())
            {
                return redirect(route('admin.order.index'))->with('success','ُسبد با موفقیت ویرایش شد ');
            }
            else
            {
                    return redirect()->back()->with('report',' خطا : مشکل درعملیات پایگاه داده');
            }
    }
    public function orderproductdelete($key,$id)
    {
        $order = order::find($key);
        $orderproduct = orderproduct::where([
            'pk_order'=>$order->pk_order,
            'pk_orderproduct'=>$id
            ])->first();
            if($orderproduct->delete())
            {
                return redirect(route('admin.order.index'))->with('success','ُسبد با موفقیت حذف شد ');
            }
            else
            {
                return redirect()->back()->with('report',' خطا : مشکل درعملیات پایگاه داده');
            }
    }

}
