<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Product;
use App\Learner;
use App\Category;
use App\Post;
use App\Profile;
use App\Behavior;
use App\Transaction;
use Validator;
use Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recent_Products = Product::where('status', 'انتشار')->orderBy('pk_product', 'desc')->get()->take(30);
        $categories = Category::where('type','محصول')->get();
        return view('site.product.index',compact('categories','recent_Products'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($slug,$desc)
    {  
        $product = Product::where('pk_product', $slug)->first();
        $recent_Products = Product::where('status', 'انتشار')->orderBy('pk_product', 'desc')->get()->take(3);
        $behavior_product= Behavior::where('pk_entity', $slug)->where('status','تایید شده')->get();

        $payment_status ="";

        $user =  Auth::user() ;
        
        if($user != null)
        {
          $payment_checks = Transaction::where('pk_product',$product['pk_product'])->where('status','معتبر')->where('pk_users',$user->pk_users)->first();
          if($payment_checks)
          {
            $payment_status ="Payed";
          }

        }

        if($user == null)
        {
            $payment_status ="No Pay";
        }
        
       
        return view('site.product.detail',compact('product','recent_Products','behavior_product','payment_status'));
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

    public function pay($slug)
    {  
        $user =  Auth::user() ;

        if($user == null)
        {
            return redirect()->back()->with('report',' خطا : لطفا در سایت ورود یا ثبت نام نمایید');
        }

        $product = Product::where('pk_product', $slug)->first();
        $profile = Profile::where('pk_users',$user->pk_users)->first();
        $wallet = $profile->wallet ; 
        $val_product = (int) $product->price ;
        $val_wallet =  (int)$wallet  ;

        if($val_wallet >= $val_product)
        {
           $new_wallet = $val_wallet - $val_product ;
           $id = $profile->pk_profiles ;
           $p = Profile::find($id);
           $p->wallet = $new_wallet ;
           $p->save();


           $transaction = new Transaction();
           $transaction->pk_users =  $user->pk_users ;
           $transaction->price = $product->price;
           $transaction->type = 'خرید دوره آموزشی';
           $transaction->digital_receipt =  rand(0,1000000000) ;
           $transaction->pk_product =  $slug ;
           $transaction->status = "عملیات موفق";
            // process extras --> save all option to array And save to $new_instance
           $data_extras = array();
           $data_extras["problem"] = 'عملیات موفق';
           $data_extras["type"] = 'خرید ازموجودی کیف پول';
          
           $transaction->extras =  json_encode($data_extras,false) ; 

           $transaction->save();



           return redirect()->back()->with('success','خرید انجام شد . می توانید دوره آموزشی را مشاهده نمایید');    

        }
        else
        {
            return redirect()->route('user.transaction.store',
             ['price' => $product->price , 'type' => 'خرید دوره آموزشی' , 'slug' => $slug ]);
        }


    }

    



}
