<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;
use App\Category;
use Shetabit\Payment\Invoice;
use Shetabit\Payment\Facade\Payment;
use Shetabit\Payment\Exceptions\InvalidPaymentException;
use Spatie\Sitemap\SitemapGenerator;
use App\Transaction;
use App\Tag;
use App\Package;
use App\Learner;
use App\Profile;
use App\Behavior;
use Validator;

class HomeController extends Controller
{
     
        public function index()
        {
          // $last_posts =  Post::select('pk_post','title','pic_content','extras')->orderby('pk_post','DESC')->take(3)->get();
          $last_posts = array();
          return view('site.academy.index',compact('last_posts'));
        }

        public function show_contactus()
        {
          return view('site.Contactus');
        
        }
        public function show_Aboutus()
        {
          return view('site.Aboutus');
        
        }

        public function show_TermsOfService()
        {
          return view('site.TermsOfService');
        
        }

        public function show_PrivacyPolicy()
        {
          return view('site.PrivacyPolicy');
        
        }

        public function Page500()
        {
          return view('error.500');
        }

        public function SitemapCreate()
        {
          SitemapGenerator::create('https://learniaa.com')->writeToFile('sitemap.xml');
          return redirect('https://learniaa.com/sitemap.xml');
          
        }

        public function search(Request $request)
        {
          
            if(request()->type_search == "post" )
            {
                $result_data =  Post::where('title', 'LIKE', '%'.request()->content_search.'%')->where('status', 'انتشار')->get();
    
                if($result_data->count() == 0)
                {
                    $recent_post = Post::get()->take(6);
                  
                    $categoryOfPage = "All";
                    return view('site.post.index',compact('recent_post','categoryOfPage'));
                }
                else
                {
                    $recent_post = $result_data ;
                    $categoryOfPage = "All";
                    return view('site.post.index',compact('recent_post','categoryOfPage'));   
                }
    
            }
            else
            {
                       $result_data =  Package::where('title', 'LIKE', '%'.request()->content_search.'%')->where('status', 'انتشار')->get();
    
                        if($result_data->count() == 0)
                        {
                          $recent_packages = Package::get()->take(6);
                          $categories = Category::where('type','محصول')->get();
                          
                          return view('site.package.index',compact('recent_packages','categories'));
                        }
                        else
                        {
                          $recent_packages = $result_data ;
                          $categories = Category::where('type','محصول')->get();
                          
                          return view('site.package.index',compact('recent_packages','categories'));   
                        }
            }
            
        }


        public function Show_AssistUs()
        {
           
            return view ('site.AssistUs');
        
        }



        public function store_assist_user(Request $request)
        {
        $validator =  $this->validation($request);
    
            if ($validator->fails())
               {
                    return redirect()->back()
                                ->withErrors($validator)
                                ->withInput();
              }
        
            else
              {
                 $new_instance = new Assist();
        
                 
                 $new_instance->pk_assist = request()->pk_assist ;
                 $new_instance->name = request()->name ;
                 $new_instance->lastname = request()->lastname;
                 $new_instance->coursename = request()->coursename;
                 $new_instance->expertise = request()->expertise ;
                 $new_instance->phonenumber = request()->phonenumber;
                 $new_instance->email = request()->email;
    
                     
                    if(  $new_instance->save())
                    {
                        return redirect(route('admin.package.index'))->with('success','با شما تماس خواهیم گرفت ');
                    }
                    else
                    {
                        return redirect()->back()->with('report',' خطا : مشکل درعملیات پایگاه داده');
                    }
    
                }
            }
                    public function validation(Request $request)
                    {
                
                        $rules =  [
                                    'pk_assist' => 'required|numeric', 
                                    'name' => 'required|string',
                                    'lastname' => 'required',
                                    'coursename' => 'required|string',
                                    'expertise' => 'required|string',
                                    'phonenumber' => 'required|numeric',
                                    'email' => 'required',
                                    
                                 ];
                
                    $messages = [
                                'pk_assist.required' => 'کلید همکاری  وارد نشده است',
                                'name.required' => 'نام وارد نشده است ',
                                'name.string' => 'نام درست وارد نشده است ',
                                'lastname.required' => 'نام خانوادگی وارد نشده است ',
                                'coursename.required' => 'نام درست وارد نشده است ',
                                'coursename.string' => 'نام دوره درست وارد نشده است ',
                                'expertise.required' => 'تخصص  وارد نشده است ',
                                'expertise.string' => 'تخصص  درست وارد نشده است ',
                                'phonenumber.required' => 'شماره تلفن  وارد نشده است ',
                                'phonenumber.numeric' => 'شماره تلفن به درستی وارد نشده است ',
                                'email.required' => 'ایمیل وارد نشده است ',
                                'email.numeric' => 'ایمیل به درستی وارد نشده است ',
    
                               ];
                
                        $validator = Validator::make($request->all(),$rules,$messages);
                
                        return $validator ;
              }
        













}
