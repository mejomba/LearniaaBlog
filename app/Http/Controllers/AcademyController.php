<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;
use Validator;
use App\Tree;
use App\Package;
use App\Behavior;
use App\Transaction;
use App\Search;
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
       // $last_posts =  Package::select('pk_post','title','pic_content','extras')->orderby('pk_post','DESC')->take(3)->get();
        $last_posts = array();

        return view('site.academy.index',compact('last_posts'));
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

    public function start_mylearn(Request $request)
    {
        $pk_tree = $_GET['pk_tree'] ;
        $selected_road = $pk_tree ;
        $tree = Tree::where('pk_tree',$pk_tree)->first();
        $road_nodes = array($tree);
        $packages = Package::where('pk_tree',$pk_tree)->orderby('sort_tree','ASC')->get();
        $road_packages = array([ 'pk' =>  $pk_tree , 'data' => $packages ]) ;
        $parent = $tree->pk_parent ;
        
        while($parent != 0)
        { 
          $row  = Tree::where('pk_tree',$parent)->first();
          array_unshift($road_nodes , $row );

          $packages = Package::where('pk_tree',$parent)->orderby('sort_tree','ASC')->get();
          array_unshift($road_packages,[ 'pk' => $parent , 'data' => $packages ]);
          $parent =  $row->pk_parent ;
        }
         return view('site.academy.mylearn',compact('road_nodes','road_packages','selected_road'));
    }

  
    public function show($pk_course,$desc,$sort,$pk_package)
    {
            /* course */
            $current_course = Course::find($pk_course);
            
            $previous_course = Course::where('sort',$current_course->sort - 1)
            ->where('pk_package',$current_course->pk_package)->first();
            
            $next_course  = Course::where('sort',$current_course->sort + 1)
            ->where('pk_package',$current_course->pk_package)->first();
            /* course */

            $package = Package::find($pk_package);
            $tree = Tree::where('pk_tree',$package->pk_tree)->first();

            /* Meta Keyword */
            $data_search = Search::where('pk_search',$package['pk_search'])->get();
            $meta_keywords = array();
            foreach($data_search as $keyword)
            { array_push($meta_keywords,$keyword->tag['fa_name']) ;}
            /* Meta Keyword */
    
            /* Auth */
            $user =  Auth::user() ;
            $payment_status = "No";
                
            if($user != null)
            {
                $payment_checks = Transaction::where('pk_package',$pk_package)
                ->where('status','عملیات موفق')
                ->where('pk_users',$user->pk_users)->first();
                
                if($payment_checks)
                {
                    $payment_status ="Yes";
                }
            }
            /* Auth */

            return view('site.academy.show',
            compact('payment_status','meta_keywords','previous_course','current_course','next_course','package','tree'));

    }

    public function course($pk_tree,$pk_package)
    {
        /* Auth */
        $user =  Auth::user() ;
        $payment_status = "No";
            
        if($user != null)
        {
            $payment_checks = Transaction::where('pk_package',$pk_package)
            ->where('status','عملیات موفق')
            ->where('pk_users',$user->pk_users)->first();
            
            if($payment_checks)
            {
                $payment_status ="Yes";
            }
        }
        /* Auth */

        $selected_road = $pk_tree ; 
        $courses =  Course::where('pk_package',$pk_package)->orderby('sort','ASC')->get();
        $package = Package::where('pk_package',$pk_package)->first();
        return view('site.academy.course',compact('courses','selected_road','payment_status','package'));
    }




   /* ---------------- Deleted Functions ---------------- */ 
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




