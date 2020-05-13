<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Tree;
use App\Product;
use App\Behavior;
use App\Transaction;
use App\Search;
use App\Post;

class AcademyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $last_posts =  Post::select('pk_post','title','pic_content','extras')->orderby('pk_post','DESC')->take(3)->get();
        return view('site.academy.index',compact('last_posts'));
    }

    public function detail()
    {
        $BeginnerTree = Product::where('title','پکیج کامل آموزش کامپیوتر')->first();
        $pkProduct_BeginnerTree =  $BeginnerTree['pk_product'];
        /* Check Payment */
        $payment_status ="";
    
        $user =  Auth::user() ;
        
        if($user != null)
        {
          $payment_checks = Transaction::where('pk_product',$pkProduct_BeginnerTree)->where('status','عملیات موفق')->where('pk_users',$user->pk_users)->first();
         
          if($payment_checks)
          {
            $payment_status ="Payed";
          }

        }

        if($user == null)
        {
            $payment_status ="No Pay";
        }
        /* Check Payment */

       $nodes = Tree::where('level','1')->get();
        return view('site.academy.detail',compact('nodes','payment_status','pkProduct_BeginnerTree'));
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
    public function show($id)
    {
        $BeginnerTree = Product::where('title','پکیج کامل آموزش کامپیوتر')->first();
        $pkProduct_BeginnerTree =  $BeginnerTree['pk_product'];


            $product = Product::find($id);
            $behavior_product= Behavior::where('pk_entity', $product['pk_product'])->where('status','تایید شده')->get();
    
              /* Meta Keyword */
            $data_search = Search::where('pk_search',$product['pk_search'])->get();
            $meta_keywords = array();
            foreach($data_search as $keyword)
            {
                array_push($meta_keywords,$keyword->tag['fa_name']) ;
            }
             /* Meta Keyword */
    
            $payment_status ="";
    
            $user =  Auth::user() ;
            
            if($user != null)
            {
                $payment_checks = Transaction::where('pk_product',$product['pk_product'])->where('status','عملیات موفق')->where('pk_users',$user->pk_users)->first();
                
                if($payment_checks)
                {
                    $payment_status ="Payed";
                }
                else
                {
                        $BeginnerTree = Product::where('title','پکیج کامل آموزش کامپیوتر')->first();
                        $pkProduct_BeginnerTree =  $BeginnerTree['pk_product'];
                        $payment_checks = Transaction::where('pk_product',$pkProduct_BeginnerTree)->where('status','عملیات موفق')->where('pk_users',$user->pk_users)->first();
                        if($payment_checks)
                        {
                        $payment_status ="Payed";
                        }
                }
            }
    
            if($user == null)
            {
                $payment_status ="No Pay";
            }

            /* Tree */
            $current_node = Tree::where('pk_product',$id)->first();
            $nodes_previous = Tree::where('sort',$current_node->sort - 1)->where('level','1')->first();
            $nodes_next  = Tree::where('sort',$current_node->sort + 1)->where('level','1')->first();
            /* Tree */

            return view('site.academy.show',compact('product','behavior_product','payment_status','meta_keywords','nodes_previous','nodes_next','pkProduct_BeginnerTree'));

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
