<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;
use App\Tree;
use App\Product;
use App\Behavior;
use App\Transaction;
use App\Search;
use App\Post;
use App\Profile;

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
       
        /* Empty From data base */
        $last_posts = array();

        return view('site.academy.index',compact('last_posts'));
    }

    public function detail()
    {/*
      
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

       $nodes = Tree::where('level','1')->get();
        return view('site.academy.detail',compact('nodes','payment_status','pkProduct_BeginnerTree'));
    */ }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   

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

    public function SaveProfile(Request $request, $id)
    {
        $validator =  $this->validation_SaveProfile($request);

    if ($validator->fails())
       {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
      }

        else
        {
              // process User --> Get info Writer And Save $new_instance
              $user =  Auth::user() ;
             
            $profile = Profile::find($id);
            $profile->birthday =  request()->year_birthday . '-'. request()->month_birthday . '-'. request()->day_birthday   ;
            $profile->email =  request()->email   ;
            $profile->state = request()->state    ;
            $profile->address =  request()->address   ;
            $profile->job =  request()->job   ;
            $profile->favourite =  request()->favourite   ;
            $profile->amount_time =  request()->amount_time   ;
            $profile->pk_users =  $user->pk_users ;

            if(request()->pic)
            {
                $pic = request()->file('pic');
                $pic_name = $pic->getClientOriginalName();
                $path = Storage::putFileAs( 'profile', $pic, $pic_name);
                $profile->pic = $pic_name ;
            } 
            else
            {
                $profile->pic = 'profile_default.jpg' ;
            }

            $profile->complete =  'YES' ;

            if($profile->save())
            {
              echo 'ok';
            }
            else
            {
                echo 'not ok';
            }
           
        }
    }

    public function validation_SaveProfile(Request $request)
    {
        $rules =  [
                    'month_birthday' => 'required|numeric', 
                    'year_birthday' => 'required|numeric|digits:4', 
                    'day_birthday' => 'required|numeric', 
                    'email' => 'required|email',
                    'state' => 'required|String', 
                    'address' => 'required|String',
                    'job' => 'required|String',
                    'favourite' => 'required|String',
                    'pic' => 'image|mimes:jpeg,png,jpg,gif,svg',
         ];

     
$messages = [
                'month_birthday.numeric' => ' ماه تاریخ تولد صحیح وارد نشده است',
                'month_birthday.required' => ' ماه تاریخ تولد  وارد نشده است',

                'day_birthday.numeric' => ' روز تاریخ تولد صحیح وارد نشده است',
                'day_birthday.required' => ' روز تاریخ تولد صحیح وارد نشده است',


                'year_birthday.numeric' => 'سال تاریخ تولد صحیح وارد نشده است',
                'year_birthday.digits' => 'سال تاریخ تولد 4 رقمی وارد نشده است',
                'year_birthday.required' => 'سال تاریخ تولد وارد نشده است',


                'pic.image' => 'تصویر شاخص  صحیح وارد نشده است',
                'pic.mimes' => 'فرمت تصویر شاخص  صحیح وارد نشده است',

                'email.email' => 'پست الکترونیکی  صحیح وارد نشده است ',
                'state.String' => 'استان صحیح وارد نشده است',
                'email.required' => 'پست الکترونیکی  وارد نشده است ',

                'address.String' => 'آدرس  صحیح وارد نشده است ',
                'address.required' => 'آدرس  وارد نشده است ',


                'job.String' => 'شغل  صحیح وارد نشده است ',
                'job.required' => 'شغل وارد نشده است ',


                'favourite.String' => 'علاقه مندی  صحیح وارد نشده است ',
                'favourite.required' => 'علاقه مندی  وارد نشده است ',

        ];

        $validator = Validator::make($request->all(),$rules,$messages);

        return $validator ;
    }

    public function register()
    {
        $user =  Auth::user() ; 
        $profile = Profile::where('pk_users',$user->pk_users)->first();

        return view('site.academy.register',compact('profile'));
    }


    public function start()
    {
        $user =  Auth::user() ;

        if($user != null)
        {
            // check completer profile 
           $pk_user =  $user->pk_users ;
          $row =  Profile::where('pk_users',$pk_user)->first();
         
            if($row->complete == 'YES')
            {
                return view('site.academy.detail');

            }
            else
            {
              $profile  =  $row ;
                return view('site.academy.register',compact('profile'));

            }
        }
        else
        {
            $redirectFromURL = "/academy/start";
            return view('auth.callbacklogin',compact('redirectFromURL'));
        }




        

    }
    }




