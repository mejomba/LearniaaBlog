<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use auth;
use App\Transaction;
use App\Profile;
use App\Package;
use App\Course;
use App\UserLog;
use Carbon\Carbon;
use Verta;
class PackageController extends Controller
{

    public function pay($pk_package)
    {  

            $redirectFromURL = $_GET['redirectFromURL'] ;
            $user =  Auth::user() ;
            $package = Package::where('pk_package', $pk_package)->first();
            $profile = Profile::where('pk_users',$user->pk_users)->first();

             return redirect()->route('transaction.store',
             ['price' => $package->price , 'type' => 'خرید دوره آموزشی' , 'pk_package' => $pk_package ,
             'redirectFromURL' => $redirectFromURL  ]);
      
    }

    /* Un Used */
 
    public function payByWallet($pk_package)
    {
        $redirectFromURL = $_GET['redirectFromURL'] ;
        $user =  Auth::user() ;
        $package = Package::where('pk_package', $pk_package)->first();
        $profile = Profile::where('pk_users',$user->pk_users)->first();
        $wallet = $profile->wallet ; 
        $val_package = (int) $package->price ;
        $val_wallet =  (int)$wallet  ;

        if($val_wallet >= $val_package)
        {
           $new_wallet = $val_wallet - $val_package ;
           $id = $profile->pk_profiles ;
           $p = Profile::find($id);
           $p->wallet = $new_wallet ;
           $p->save();

           $transaction = new Transaction();
           $transaction->pk_users =  $user->pk_users ;
           $transaction->price = $package->price;
           $transaction->type = 'خرید دوره آموزشی';
           $transaction->digital_receipt =  rand(0,1000000000) ;
           $transaction->pk_package =  $pk_package ;
           $transaction->status = "عملیات موفق";
            // process extras --> save all option to array And save to $new_instance
           $data_extras = array();
           $data_extras["problem"] = 'عملیات موفق';
           $data_extras["type"] = 'خرید ازموجودی کیف پول';
           $transaction->extras =  json_encode($data_extras,false) ; 
           $transaction->save();

        //   return redirect($redirectFromURL)->with('success','خرید انجام شد . می توانید دوره آموزشی را مشاهده نمایید');    
         }
         else
         {
            $package = Package::where('pk_package', $pk_package)->first();
          //  return redirect()->route('transaction.store',
           // ['price' => $package->price , 'type' => 'خرید دوره آموزشی' , 'pk_package' => $pk_package ]);
         }
    }


    public function insertDataCourseAdobeXD(Request $request)
    {   
        $i = 1 ;
        for ($row = 1; $row <= 129; $row++)
        {
                if($row == 56)
                {
                    continue ; 
                }
                else
                {
                    $course = new Course();

                    $course->pk_package =  6 ;
                    $course->pk_learner =  8 ;
                    $course->name = "پروتوتایپ با ادوب ایکس دی - قسمت $i" ;
                    $course->sort =  $i ;
                    $course->pic_cover = "$i.jpg";
                    $course->Alt_cover = "ادوب ایکس دی $i" ;
                    $course->download_link ="https://5c76fd66bf6fa1001152cbea.liara.space/learniaa/Videos_Design_AdobeXD/Design_AdobeXD$row.mp4";
                    $course->schema_markup='{"@context":"https:\/\/schema.org","@type":"Product","name":"\u0622\u0645\u0648\u0632\u0634 \u0645\u0641\u0627\u0647\u06cc\u0645 \u0648 \u0627\u0635\u0648\u0644 \u0637\u0631\u0627\u062d\u06cc","image":"https:\/\/5c76fd66bf6fa1001152cbea.liara.space\/learniaa\/packageTree_Beginner_Design.jpg","description":"\u0622\u0645\u0648\u0632\u0634 \u0645\u0641\u0627\u0647\u06cc\u0645 \u0648 \u0627\u0635\u0648\u0644 \u0637\u0631\u0627\u062d\u06cc","offer_type":"Offer","priceCurrency":"IRR","price":100000,"itemCondition":"https:\/\/schema.org\/NewCondition","datePublished":"2020-07-27","dateModified":"2020-07-27"}';
                    $course->metatag='{"htmlmeta":{"keywords":"1","description":"1","author":"1","refresh":"1","viewport":"1"},"opengraph":{"og_title":"1","og_image":"1","og_description":"1","og_type":"1","og_article":"1"},"twitter":{"twitter_card":"1","twitter_site":"1","twitter_description":"1","twitter_title":"1"}}';
                    $course->video_schema = '{"@context":"https:\/\/schema.org","@type":"VideoObject","name":"\u0622\u0645\u0648\u0632\u0634 \u0645\u0641\u0627\u0647\u06cc\u0645 \u0648 \u0627\u0635\u0648\u0644 \u0637\u0631\u0627\u062d\u06cc","description":"\u0622\u0645\u0648\u0632\u0634 \u0645\u0641\u0627\u0647\u06cc\u0645 \u0648 \u0627\u0635\u0648\u0644 \u0637\u0631\u0627\u062d\u06cc","thumbnailUrl":"https:\/\/5c76fd66bf6fa1001152cbea.liara.space\/learniaa\/course\/Images_Beginner_Design1.jpg","uploadDate":"2020-07-27"}';
                    $course->isFree = "No";
                    $i = $i + 1 ;

                    $course->save();

                }
                   
        }
        echo 'OK';


    }


    public function index()
    {
        //
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
        //
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
