<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;
use Validator;
use App\Tree;
use App\Product;
use App\Behavior;
use App\Transaction;
use App\Search;
use App\Post;
use App\Profile;
use App\Course;
use App\History;


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

    public function start_mylearn(Request $request)
    {
        $pk_tree = $_GET['pk_tree'] ;
        $courses = Course::where('pk_tree',$pk_tree)->orderby('sort','ASC')->get();
        $tree = Tree::where('pk_tree',$pk_tree)->first();
        $pk_AllCourse_product = $tree->pk_AllCourse_product;

        /* Payments */
        $payment_status ="";
        $user =  Auth::user() ;
        if($user != null)
        {
          $payment_checks = Transaction::where('pk_product',$pk_AllCourse_product)->where('status','عملیات موفق')->where('pk_users',$user->pk_users)->first();
          if($payment_checks)
          {
            $payment_status ="Payed";
          }
        }
        if($user == null)
        {
            $payment_status ="No Pay";
        }
        /* Payments */

        /* Update User History */
      /*  $is_history_save = History::where(['pk_users' => $user->pk_users , 'pk_tree' => $pk_tree])->first();
        if($is_history_save == null)
        {
           
            $new_history = new History();
            $new_history->pk_users = $user->pk_users ;
            $profile =  Profile::where('pk_users', $user->pk_users)->first() ;
            $new_history->pk_profile = $profile['pk_profiles'] ;
            $new_history->pk_tree = $pk_tree ;
            $new_history->description = 'شروع دوره' ;
            if($new_history->save())
            {}  
            else
            {
               return redirect()->back()->with('report',' خطا : مشکل درعملیات پایگاه داده');
            }
        }
        */
       /* Update User History */

    
        return view('site.academy.mylearn',compact('courses','tree','payment_status'));
    
    }

    public function detail(Request $request)
    {
         $nodes = Tree::where( ['level' => '0' ] )->get();
         return view('site.academy.detail',compact('nodes'));
    }
    

    public function road(Request $request)
    {
        $pk_tree = $_GET['pk_tree'] ;
        $tree = Tree::where('pk_tree',$pk_tree)->first();

        $nodes = Tree::where( ['pk_parent' => $pk_tree , 'level' => $tree->level + 1 ] )->get();

        return view('site.academy.road',compact('tree','nodes'));

    }

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
         /* Tree */
         $current_node = Course::where('pk_product',$id)->first();
         $current_pk_tree = $current_node->pk_tree ;
         $nodes_previous = Course::where('sort',$current_node->sort - 1)->where('pk_tree',$current_pk_tree)->first();
         $nodes_next  = Course::where('sort',$current_node->sort + 1)->where('pk_tree',$current_pk_tree)->first();
         /* Tree */
          $tree = Tree::where('pk_tree',$current_node->pk_tree)->first(); 
          $pk_AllCourse_product =  $tree->pk_AllCourse_product ;

            $product = Product::find($id);
          
            // $behavior_product= Behavior::where('pk_entity', $product['pk_product'])->where('status','تایید شده')->get();
    
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
                   $payment_checks = Transaction::where('pk_product',$pk_AllCourse_product)->where('status','عملیات موفق')->where('pk_users',$user->pk_users)->first();
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

           

            return view('site.academy.show',compact('tree','product','payment_status','meta_keywords','nodes_previous','nodes_next','current_pk_tree'));

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
            
                return redirect()->route('academy.detail');
            }
            else
            {
                return redirect()->back()->with('report',' خطا : مشکل درعملیات پایگاه داده');
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


 }




