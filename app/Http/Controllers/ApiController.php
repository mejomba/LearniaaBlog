<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Validator;
use Auth;
use App\Category;
use App\Post;
use App\User;
use App\Discount;
use App\Package;
use App\Vote;
use App\Course;
use App\OrderPackage;
use App\Order;
use App\Delivery;
use Verta;
use App\Log;
use App\Routing;

use App\CustomClass\SmsSender;
use App\Mail\SendMail;

class ApiController extends Controller
{
    public function insertDataPackage_AdobeXD()
    {   
        for ($row = 1; $row <= 263; $row++)
        {
             $course = new Course();
             $course->pk_package =  16 ;
             $course->pk_learner =  15 ;
             $course->name = "دوره آموزش اچ تی ام ال - سی اس اس - قسمت $row" ;
             $course->sort =  $row ;
             $course->pic_cover = "HtmlCss$row.JPG";
             $course->Alt_cover = "دوره آموزش اچ تی ام ال $row" ;
             $course->download_link ="learniaa/Videos_FrontEnd_HTMLCSS/FrontEnd_HTMLCSS$row.mp4";
             $course->schema_markup='{"@context":"https:\/\/schema.org","@type":"Product","name":"\u0622\u0645\u0648\u0632\u0634 \u0645\u0641\u0627\u0647\u06cc\u0645 \u0648 \u0627\u0635\u0648\u0644 \u0637\u0631\u0627\u062d\u06cc","image":"https:\/\/5c76fd66bf6fa1001152cbea.liara.space\/learniaa\/packageTree_Beginner_Design.jpg","description":"\u0622\u0645\u0648\u0632\u0634 \u0645\u0641\u0627\u0647\u06cc\u0645 \u0648 \u0627\u0635\u0648\u0644 \u0637\u0631\u0627\u062d\u06cc","offer_type":"Offer","priceCurrency":"IRR","price":100000,"itemCondition":"https:\/\/schema.org\/NewCondition","datePublished":"2020-07-27","dateModified":"2020-07-27"}';
             $course->metatag='{"htmlmeta":{"keywords":"1","description":"1","author":"1","refresh":"1","viewport":"1"},"opengraph":{"og_title":"1","og_image":"1","og_description":"1","og_type":"1","og_article":"1"},"twitter":{"twitter_card":"1","twitter_site":"1","twitter_description":"1","twitter_title":"1"}}';
             $course->video_schema = '{"@context":"https:\/\/schema.org","@type":"VideoObject","name":"\u0622\u0645\u0648\u0632\u0634 \u0645\u0641\u0627\u0647\u06cc\u0645 \u0648 \u0627\u0635\u0648\u0644 \u0637\u0631\u0627\u062d\u06cc","description":"\u0622\u0645\u0648\u0632\u0634 \u0645\u0641\u0627\u0647\u06cc\u0645 \u0648 \u0627\u0635\u0648\u0644 \u0637\u0631\u0627\u062d\u06cc","thumbnailUrl":"https:\/\/5c76fd66bf6fa1001152cbea.liara.space\/learniaa\/course\/Images_Beginner_Design1.jpg","uploadDate":"2020-07-27"}';
             $course->isFree = "No";
             $course->save();   
             
          }
    }


    public function TelegramGetListDraftPost()
    {
        $results = Blog::where('status','پیش نویس')->select('pk_post', 'title','status')->get();
        return $results ;
    }

    public function TelegramSetPublishPost(Request $request)
    {
        $post = Blog::find($_POST['id']);
        $post->status = "انتشار" ;
        $post->save();
        return response()->json('Successfully Update');
    }


    public function  DiscountCalculator (Request $request)
    {
          $discount_code =  $_POST['discount_code'] ;  
          $discount_type=Discount::select('type')->where('discount_code',$discount_code)->first();
          
          $order = order::select('pk_order')->where(
            ['pk_user'=>$_POST['pk_user'],
            'status_transaction' => 'تکمیل نشده'
        ])->first();          
        
        if ($discount_type->type=='محصول محور')
          {
             if(isset($_POST['pk_user']) != TRUE )
            {           
                return response()->json('login required');
            }
            $pk_user=$_POST['pk_user'];
            
            $discount_row = Discount::where('discount_code', $discount_code)->first();
            $package = Discount::select('pk_package')->where('discount_code', $discount_code)->first();
            $package_row = orderpackage::where(['pk_order' => $order->pk_order, 'pk_package'=> $package->pk_package])->first();
          
            if($discount_row != null)
            {
                $package_price =  $package_row->Total_price ;
                $client = new \GuzzleHttp\Client();
                $response = $client->request('POST', 'https://learniaa.com/api/DateTime/CheckTarikhIsLastFromNow', [
                    'form_params' => [ 'DateRequest' => $discount_row->date_Expire ] ]);
                $response = $response->getBody()->getContents();
                $checkTarikh = json_decode( $response);
                    
                    if($discount_row->status =='فعال' && $checkTarikh == 'Valid' &&  $package_price >= $discount_row->minimum_buy )
                    {
                        if( $discount_row->limit == null)
                        {
                            $price_discount = ( $discount_row->percent_discount / 100) * $package_price;  
                            if($discount_row->maxdiscount >= $price_discount )
                            {
                                $package_priceByDiscount = $package_price - $price_discount ;
                            }
                            else
                            {
                                $package_priceByDiscount = $package_price -  $discount_row->maxdiscount ;
                            }
                            $detail=array([
                                'type'=>'محصول محور',
                                'pk_package'=>$package->pk_package,
                                'price'=>$package_priceByDiscount
                            ]);
                            return response()->json($detail);                        }
                        else
                        {
                            if($discount_row->limit > 0)
                            {
                                $new_limit = $discount_row->limit - 1 ;
                                $update_discount = Discount::find($discount_row->pk_discount);
                                $update_discount->limit =  $new_limit ;
                                $update_discount->save();

                                /////
                                $price_discount = ( $discount_row->percent_discount / 100) * $package_price;  
                                if($discount_row->maxdiscount >= $price_discount )
                                {
                                    $package_priceByDiscount = $package_price - $price_discount ;
                                }
                                else
                                {
                                    $package_priceByDiscount = $package_price -  $discount_row->maxdiscount ;
                                }
                                $detail=array([
                                    'type'=>'محصول محور',
                                    'pk_package'=>$package->pk_package,
                                    'price'=>$package_priceByDiscount
                                ]);
                                return response()->json($detail);

                            }
                            else
                            {
                                return response()->json("Not Valid");
                            } 
                        }
                }
                else
                {
                    return response()->json("Not Valid");
                }
            }
        }elseif($discount_type->type=='عمومی')
        {
            $total=0;
            if(isset($_POST['pk_user']) != TRUE )
            {           
                return response()->json('login required');

            }
            $pk_user=$_POST['pk_user'];
            
            $discount_row = Discount::where('discount_code', $discount_code)->first();
            $package_row = orderpackage::select ('pk_package','total_price')->where('pk_order' , $order->pk_order)->get();

            foreach($package_row as $price )
            {
                $total += $price->total_price;
            }
            $package_price =  $total ;
            if($discount_row != null)
            {
                
                $client = new \GuzzleHttp\Client();
                $response = $client->request('POST', 'https://learniaa.com/api/DateTime/CheckTarikhIsLastFromNow', [
                    'form_params' => [ 'DateRequest' => $discount_row->date_Expire ] ]);
                $response = $response->getBody()->getContents();
                $checkTarikh = json_decode( $response);
            
                    if($discount_row->status =='فعال' && $checkTarikh == 'Valid' &&   $package_price >= $discount_row->minimum_buy )
                    {
                        if( $discount_row->limit == null)
                        {
                            $price_discount = ( $discount_row->percent_discount / 100) * $package_price;  
                            if($discount_row->maxdiscount >= $price_discount )
                            {
                                $package_priceByDiscount = $package_price - $price_discount ;
                            }
                            else
                            {
                                $package_priceByDiscount = $package_price -  $discount_row->maxdiscount ;
                            }

                            $detail=array([
                                'type'=>'عمومی',
                                'pk_package'=>'',
                                'price'=>$package_priceByDiscount
                            ]);
                            return response()->json($detail);                        }
                        else
                        {
                            if($discount_row->limit > 0)
                            {
                                $new_limit = $discount_row->limit - 1 ;
                                $update_discount = Discount::find($discount_row->pk_discount);
                                $update_discount->limit =  $new_limit ;
                                $update_discount->save();

                                /////
                                $price_discount = ( $discount_row->percent_discount / 100) * $package_price;  
                                if($discount_row->maxdiscount >= $price_discount )
                                {
                                    $package_priceByDiscount = $package_price - $price_discount ;
                                
                
                                }
                                else
                                {
                                    $package_priceByDiscount = $package_price -  $discount_row->maxdiscount ;
                                }
                                $detail=array([
                                    'type'=>'عمومی',
                                    'pk_package'=>'',
                                    'price'=>$package_priceByDiscount
                                ]);
                                return response()->json($detail);

                            }
                            else
                            {
                                return response()->json("Not Valid");
                            } 
                        }
                }
                else
                {
                    return response()->json("Not Valid");
                }
            }
        }
    
    }
       
 public function SendSms(Request $request)
 {
    $mobile = $_POST['mobile'];
    $message = $_POST['message'];
    $data = new SmsSender();
    $data->SendSms($mobile,$message);
    
}
 /*  Common & INFO API's   */   
 public function DateTimeGetNow()
 {
    $verta = Verta::now();
    $date =  $verta->year . '/' . $verta->month . '/' .    $verta->day ;
    return response()->json($date);
  
 }

 public function DateTimeCheckTarikhIsLastFromNow()
 {
     $DateRequest = $_POST['DateRequest'];
     $DateArray = explode('/',$DateRequest);

     $client = new \GuzzleHttp\Client();
     $response = $client->request('GET', 'https://learniaa.com/api/DateTime/GetNow', [
         'form_params' => [ ] ]);
     $response = $response->getBody()->getContents();
     $response = json_decode( $response);
     $verta = explode('/',$response);
     
    if( $DateArray[0] > $verta[0] )
    {
        return response()->json("Valid");
    }
    if( $DateArray[0] == $verta[0] )
    {
        if($DateArray[1] > $verta[1])
        {
            return response()->json("Valid");
        }
        if($DateArray[1] == $verta[1])
        {
            if($DateArray[2] > $verta[2])
            {
                return response()->json("Valid");
            }
            if($DateArray[2] == $verta[2])
            {
                return response()->json("Valid");
            }
            if($DateArray[2] < $verta[2])
            {
                return response()->json("Not Valid");
            }
        }
        if($DateArray[1] < $verta[1])
        {
            return response()->json("Not Valid");
        }
    }
    if( $DateArray[0] < $verta[0] )
    {
        return response()->json("Not Valid");
    }
 
 }



 /*  Common & INFO API's   */  
 public function SendEmail(Request $request)
 {
     //
     $details = [
         'title' => $_POST['title'],
         'body' => $_POST['message']
     ];
         $type = $_POST['type'];
        $address = 'www.'.$_POST['ToAddress'];
     \Mail::to($address)->send(new SendMail($details,$type));

     return response()->json("ایمیل یا موفقیت ارسال شد");
 }




 public function setaddress(Request $request)
 {
    $user = auth::user();
    $newaddress = new delivery();
    $newaddress->pk_user=$_POST['pk_user'];
    $newaddress->ostan=$_POST['ostan'];
    $newaddress->shahr=$_POST['shahr'];
    $newaddress->address=$_POST['address'];
    $newaddress->pelak=$_POST['pelak'];
    $newaddress->vahed=$_POST['vahed'];
    $newaddress->codeposti=$_POST['codeposti'];
    $newaddress->reciever_name=$_POST['reciever_name'];
    $newaddress->reciever_mobile=$_POST['reciever_mobile'];
    $newaddress->save();
    return response()->json("آدرس با موفقیت ثبت شد");


 }
 public function showaddress(Request $request)
 {
    $user = auth::user();
    $delivery = delivery::where('pk_user',$_POST['pk_user'])->get();
    return response()->json($delivery);

 }


 public function selectaddress(Request $request,$id)
{
    $user = auth::user();
    $delivery = delivery::find($id)->where(['pk_user',$_POST['pk_user']])->first();
    $order = new order();
    $order->pk_address= $delivery->pk_address;
    $order->save();
}

public function downloadcounter($id)
{
    $package= package::find($id);
    $count = $package->download_count + 1;
    $package->download_count = $count;
    $package->save();
}

public function filter()
{
    $data = vote::get();
    return response()->json($data);

}

public function GenerateNewUuid()
{
    $uuid= (string) str::uuid();
    $newlog = new Log();
    $newlog->uuid = $uuid;
    $newlog->sort = '0';
    $newlog->save();
    return response()->json([
        'uuid'=> $uuid
    ]);
}

public function SetFamilyUser(Request $request)
{
    if($_POST['Name'] == "")
    {
      return response()->json([ 'status'=> 'error' ]);                   
    }
    else
    {
        $log = Log::where('uuid',$_POST['Uuid'])->first();
        $log->name = $_POST['Name'];
        $log->sort = '1';
        $log->save();

        return response()->json(['status'=> 'ok' ]);
    }

            
        

}

public function GetPopupData(Request $request)
{
    
        $route = Routing::where('Location_User_Id',$_POST['LocationUserId'])->first();
        $feedback = json_decode($route->feedback);
        return response()->json([
            'content'=> $route->content,
            'question' =>$route->question,
            'feedback'=>$feedback
        ]);
    
}

public function  SetAnswerUser(Request $request)
{
    $log = Log::where('uuid',$_POST['Uuid'])->orderby('uuid','DESC')->first();
    $newlog = new Log();
    $newlog->uuid=$log->uuid;
    $newlog->name=$log->name;
    $newlog->location_user_id=$_POST['LocationUserId'];
    $newlog->answer=$_POST['SelectAnswerId'];
    $newlog->sort = $log->sort+1;
    $newlog->save();
    $route = Routing::where('location_user_id',$_POST['LocationUserId'])->first();
    $feedback = json_decode($route->feedback);
    /*$nextroute ='';
    foreach($feedback as $item)
    {
        if($item == $_POST['SelectAnswerId'])
        {
        
        $nextroute = Routing::where('location_user_id',$item)->first();

        }
    }
    $feedback = json_decode($nextroute->feedback);*/
    return response()->json([
        'status'=> 'ok'
    ]);
}

public function roadmapvalidate(Request $request)
    {

        $rules =  [
                    'name' => 'required|String|max:200',                 
                 ];

    $messages = [
                 
                'name.required' => 'نام  وارد نشده است',
                'name.String' => 'نام  صحیح وارد نشده است',
                'name.max' => 'نام  طولانی وارد شده است',

                ];

        $validator = Validator::make($request->all(),$rules,$messages);

        return $validator ;
    }
    public function SetEndRoadMap(Request $request)
    {
        $log = Log::where('uuid',$_POST['Uuid'])->orderby('uuid','DESC')->first();
        $newlog = new Log();
        $newlog->uuid=$log->uuid;
        $newlog->name=$log->name;
        $newlog->location_user_id=$_POST['LocationUserId'];
        $newlog->answer='endgame';
        $newlog->sort = $log->sort+1;
        $newlog->save();

    }



}
   
