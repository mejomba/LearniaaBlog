<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrderProduct;
use App\Product;


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
        $neworder->status_transaction = request()->status_transaction;
        $neworder->pk_user = request()->pk_user;
        $neworder->type_delivery = request()->type_delivery;
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
        $orderproduct = orderproduct::where('pk_order',$id)->get();
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
        $orders = Order::find($id);
        return view('admin.order.edit',compact('orders')); 
        
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
        //$order ->pk_address = request()->pk_address;
        $order->status_transaction  = request()->status_transaction;
        $order->type_delivery= request()->type_delivery;
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
       
        $orderproduct_count = orderproduct::where('pk_order',$id)->count();

            if($order->delete())
            {
                if($orderproduct_count != 0)
                {
                    $orderproducts = orderproduct::where('pk_order',$id)->get();
                    foreach($orderproducts  as $row)
                    {
                        $row->delete();
                    }
                }
               
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


    public function orderproductcreate($key)
    {
        $order = order::find($key);

        return view(('admin.order.orderproductstore'),compact('order'));
    }

    public function orderproductstore($key)
    {
        $order = order::find($key);

        $neworderproduct = new orderproduct();
        $neworderproduct->pk_order = $key;
        $neworderproduct->pk_product = request()->pk_product;
        $product = Product::select('price')->where('pk_product',request()->pk_product)->first();
        $neworderproduct->price = $product->price;
        $neworderproduct->count = request()->count;
        $total = (int)$product->price * (int)request()->count;
        $neworderproduct->Total_price = $total;
        $neworderproduct->save();
        if($neworderproduct->save())
        {
            return redirect(route('admin.order.show'))->with('success','محصول با موفقیت اضافه شد ');
        }
        else
        {
            return redirect()->back()->with('report',' خطا : مشکل درعملیات پایگاه داده');
        }    
    }
    public function orderproductupdate($key,$id)
    {
        $order = order::find($key);
        $orderproduct = orderproduct::where([
            'pk_order'=>$order->pk_order,
            'pk_orderproduct'=>$id
            ])->first();
      
        $orderproduct ->count   = request()->count ;
        $total = request()->count * $orderproduct ->price;
        $orderproduct ->Total_price   = $total ;
     
        if($orderproduct->save())
            {
                return redirect(route('admin.order.show'))->with('success','ُسبد با موفقیت ویرایش شد ');
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
                return redirect(route('admin.order.show'))->with('success','ُسبد با موفقیت حذف شد ');
            }
            else
            {
                return redirect()->back()->with('report',' خطا : مشکل درعملیات پایگاه داده');
            }
    }

}
