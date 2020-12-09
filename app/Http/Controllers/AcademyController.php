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
use App\Blog;
use App\Section;
use Carbon\Carbon;
use Verta;
use App\UserLog;

class AcademyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth::user())
        {
            $userlog = new UserLog();
            $userlog->pk_user=auth::user()->pk_users;
            $userlog->url=url()->current();
            $date = new Verta();
            $date->timezone = 'Asia/Tehran';
            $time = Carbon::now('IRAN')->format('g:i A');
            $userlog->date=$date->format('y/m/d');
            $userlog->time=$time;
            $userlog->save();

        }
        $recent_post = array();
        $recent_post =  Blog::orderby('pk_blog','DESC')->take(4)->get();
        $packages = package::where('status','انتشار')->orderby('pk_package','DESC')->paginate(8);
        
        return view('site.academy.index',compact('recent_post','packages'));
    }

    public function detail(Request $request)
    {
        /*
         $nodes = Tree::where( ['level' => '0' ] )->get();
         return view('site.academy.detail',compact('nodes')); 
         */

         return view('site.roadmap.startgame');
    }

    public function roadmap(Request $request)
    {
        $uuid = request()->uuid ;
        $name=request()->name ; 
        return view('site.roadmap.roadmap',compact('name','uuid'));
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
        if(auth::user())
        {
            $userlog = new UserLog();
            $userlog->pk_user=auth::user()->pk_users;
            $userlog->url=url()->current();
            $date = new Verta();
            $date->timezone = 'Asia/Tehran';
            $time = Carbon::now('IRAN')->format('g:i A');
            $userlog->date=$date->format('y/m/d');
            $userlog->time=$time;
            $userlog->save();

        }
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

  
    public function show($pk_course,$desc,$sort,$pk_package,$pk_section)
    {
        if(auth::user())
        {
            $userlog = new UserLog();
            $userlog->pk_user=auth::user()->pk_users;
            $userlog->url=url()->current();
            $date = new Verta();
            $date->timezone = 'Asia/Tehran';
            $time = Carbon::now('IRAN')->format('g:i A');
            $userlog->date=$date->format('y/m/d');
            $userlog->time=$time;
            $userlog->save();

        }
            /* course */
            $current_course = Course::find($pk_course);
            
            $previous_course = Course::where('sort',$current_course->sort - 1)
            ->where('pk_package',$current_course->pk_package)->first();
            
            $next_course  = Course::where('sort',$current_course->sort + 1)
            ->where('pk_package',$current_course->pk_package)->first();
            /* course */

            /* PlayList */
            $sections= Section::where('pk_section',$pk_section)->orderby('sort','ASC')->first();

            $DataSection = array();
         //   foreach ($sections as $key => $section) 
          //  {
               $courses = Course::where('pk_package',$pk_package)->whereBetween('sort',
                           [$sections->part_from, $sections->part_to])->get();
    
               array_push($DataSection,['Section' => $sections , 'Courses' => $courses , 'Current_Course' => $current_course ]) ; 
           // }

            


            /*
            $DataSection = array();

            for ($row = $current_course->sort; $row < $current_course->sort - 10 ; $row--) 
            {
              $search_course =   Course::where('sort',$current_course->sort + 1)
                ->where('pk_package',$current_course->pk_package)->first();

                array_push($DataSection,[ 'Courses' => $search_course ]) ; 
            }

            array_push($DataSection,[ 'Courses' =>  $current_course ]) ;

            for ($row = $current_course->sort; $row < $current_course->sort + 10 ; $row++) 
            {
              $search_course =   Course::where('sort',$current_course->sort + 1)
                ->where('pk_package',$current_course->pk_package)->first();

                array_push($DataSection,[ 'Courses' => $search_course ]) ; 
            }
            */
            /* PlayList */


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

                    return view('site.academy.show',
                    compact('DataSection','payment_status','meta_keywords','previous_course','current_course','next_course','package','tree'));
        
                }
            }
            /* Auth */
            if($current_course['isFree'] == 'Yes')
            {
                return view('site.academy.show',
                compact('DataSection','payment_status','meta_keywords','previous_course','current_course','next_course','package','tree'));
            }

            return redirect()->back()->with('report','به علت خریداری نکردن دوره به این قسمت دسترسی نداری به قسمت لیست پخش برو');


    }

    public function course($pk_tree,$pk_package)
    {
        if(auth::user())
        {
            $userlog = new UserLog();
            $userlog->pk_user=auth::user()->pk_users;
            $userlog->url=url()->current();
            $date = new Verta();
            $date->timezone = 'Asia/Tehran';
            $time = Carbon::now('IRAN')->format('g:i A');
            $userlog->date=$date->format('y/m/d');
            $userlog->time=$time;
            $userlog->save();

        }
        /* Auth */
        $user =  Auth::user() ;
        $pk_user = "Null";
        $payment_status = "No";
            
        if($user != null)
        {
            $pk_user =  $user->pk_users ;
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
        $package = Package::where('pk_package',$pk_package)->first();
        $behaviors = Behavior::where(['pk_entity'=>$pk_package , 'type_entity'=>'پست' ])->get();
        $sections= Section::where('pk_package',$pk_package)->orderby('sort','ASC')->get();

        $DataSection = array();
        foreach ($sections as $key => $section) 
        {
           $courses = Course::where('pk_package',$pk_package)->whereBetween('sort',
                       [$section->part_from, $section->part_to])->get();

           array_push($DataSection,['Section' => $section , 'Courses' => $courses ]) ; 
        }
        return view('site.academy.course',compact('selected_road','payment_status','package','pk_user','behaviors','DataSection'));
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
               /* return redirect()->back()->with('report',' خطا : مشکل درعملیات پایگاه داده'); */
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
    public function quicklearn()
    {
        if(auth::user())
        {
            $userlog = new UserLog();
            $userlog->pk_user=auth::user()->pk_users;
            $userlog->url=url()->current();
            $date = new Verta();
            $date->timezone = 'Asia/Tehran';
            $time = Carbon::now('IRAN')->format('g:i A');
            $userlog->date=$date->format('y/m/d');
            $userlog->time=$time;
            $userlog->save();

        }
        $packages = package::where('status','انتشار')->paginate(16);
        return view('site.academy.quicklearn',compact('packages'));
    }


 }




