<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrderPackage;
use App\Package;
use Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* Security Admin Panel */
        if(Auth::user()->type != 'مدیر'){ return redirect()->back(); }
        /* Security Admin Panel */        
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
        $orderpackage = orderpackage::where('pk_order',$id)->get();
        $instance_Model_order = new orderpackage();
        $names =   $instance_Model_order->GetListAllNameColumns_ForTable();
        return view('admin.order.show',compact('orderpackage','order','names')); 
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
       
        $orderpackage_count = orderpackage::where('pk_order',$id)->count();

            if($order->delete())
            {
                if($orderpackage_count != 0)
                {
                    $orderpackages = orderpackage::where('pk_order',$id)->get();
                    foreach($orderpackages  as $row)
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
    public function orderpackageedit($key,$id)
    {
        $order = order::find($key);
        $orderpackage = orderpackage::where([
            'pk_order'=>$order->pk_order,
            'pk_orderpackage'=>$id
            ])->first();

            return view('admin.order.orderpackageedit',compact('orderpackage','order')); 
    }


    public function orderpackagecreate($key)
    {
        $order = order::find($key);

        return view(('admin.order.orderpackagestore'),compact('order'));
    }

    public function orderpackagestore($key)
    {
        $order = order::find($key);

        $neworderpackage = new orderpackage();
        $neworderpackage->pk_order = $key;
        $neworderpackage->pk_package = request()->pk_package;
        $package = Package::select('price')->where('pk_package',request()->pk_package)->first();
        $neworderpackage->price = $package->price;
        $neworderpackage->count = request()->count;
        $total = (int)$package->price * (int)request()->count;
        $neworderpackage->Total_price = $total;
        $neworderpackage->save();
        if($neworderpackage->save())
        {
            return redirect(route('admin.order.show'))->with('success','محصول با موفقیت اضافه شد ');
        }
        else
        {
            return redirect()->back()->with('report',' خطا : مشکل درعملیات پایگاه داده');
        }    
    }
    public function orderpackageupdate($key,$id)
    {
        $order = order::find($key);
        $orderpackage = orderpackage::where([
            'pk_order'=>$order->pk_order,
            'pk_orderpackage'=>$id
            ])->first();
      
        $orderpackage ->count   = request()->count ;
        $total = request()->count * $orderpackage ->price;
        $orderpackage ->Total_price   = $total ;
     
        if($orderpackage->save())
            {
                return redirect(route('admin.order.show'))->with('success','ُسبد با موفقیت ویرایش شد ');
            }
            else
            {
                    return redirect()->back()->with('report',' خطا : مشکل درعملیات پایگاه داده');
            }
    }
    public function orderpackagedelete($key,$id)
    {
        $order = order::find($key);
        $orderpackage = orderpackage::where([
            'pk_order'=>$order->pk_order,
            'pk_orderpackage'=>$id
            ])->first();
            if($orderpackage->delete())
            {
                return redirect(route('admin.order.show'))->with('success','ُسبد با موفقیت حذف شد ');
            }
            else
            {
                return redirect()->back()->with('report',' خطا : مشکل درعملیات پایگاه داده');
            }
    }

}
