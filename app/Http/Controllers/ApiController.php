<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use App\Category;
use App\Post;
use App\User;
use App\Discount;
use App\Product;
use App\Vote;
use App\Course;
use App\OrderProduct;
use App\Order;
use App\Delivery;
use Verta;
use App\CustomClass\SmsSender;
use App\Mail\SendMail;

class ApiController extends Controller
{
    public function insertDataProduct_AdobeXD()
    {   
        for ($row = 1; $row <= 129; $row++)
        {
                if($row == 56)
                {
                    continue ; 
                }
                else
                {
                    $new_instance = new product();
                
                    $new_instance->pk_category = "1013" ;
                    $new_instance->pk_search =  "5ee92a660c122" ;
                    $new_instance->pk_learner = "8" ;
                    $new_instance->title = "آموزش رسم پروتوتایپ با ادوب ایکس دی - قسمت $row" ;
                    $new_instance->pic = "Tree_Design_AdobeXD.jpg" ;
                    $new_instance->price = "2700";
                    $new_instance->time = "10:00";
                    $new_instance->desc = "آموزش رسم پروتوتایپ با ادوب ایکس دی" ;
                    $new_instance->count = 128 ;
                    $new_instance->language = "فارسی";
                    $new_instance->subtitle = "ندارد";
                    $new_instance->status = "انتشار";
                    $new_instance->file = "<video class='afterglow' id='my-video' width='1920' height='1080' src='https://5c76fd66bf6fa1001152cbea.liara.space/learniaa/Videos_Design_AdobeXD/Design_AdobeXD$row.mp4'></video>";
                    $new_instance->preview = "<video class='afterglow' id='my-video' width='1920' height='1080' src='https://5c76fd66bf6fa1001152cbea.liara.space/learniaa/Videos_Design_AdobeXD/Design_AdobeXD_Preview.mp4'></video>";
                    $new_instance->download_link = "https://5c76fd66bf6fa1001152cbea.liara.space/learniaa/Videos_Design_AdobeXD/Design_AdobeXD$row.mp4";

                    $new_instance->save();
                }
        }
    }

    public function insertDataCourse_AdobeXD(Request $request)
    {   
        $row_pk_pdroduct = 115 ;
        $sort = 2 ;
        for ($row = 1; $row <= 129; $row++)
        { 
            if($row == 56)
            {
                continue ; 
            }
            else
            {
            
                $newcourse = new Course();
                $newcourse->pk_tree = 20;
                $newcourse->pk_product = $row_pk_pdroduct ;
                $newcourse->sort = $sort ;
                $newcourse->name = "قسمت $row - آموزش رسم پروتوتایپ با ادوب ایکس دی";
                $row_pk_pdroduct = $row_pk_pdroduct + 1 ;
                $sort = $sort + 1 ;
                $newcourse->save();
            }

        }
    }




    public function TelegramGetListDraftPost()
    {
        $results = Post::where('status','پیش نویس')->select('pk_post', 'title','status')->get();
        return $results ;
    }

    public function TelegramSetPublishPost(Request $request)
    {
        $post = Post::find($_POST['id']);
        $post->status = "انتشار" ;
        $post->save();
        return response()->json('Successfully Update');
    }




    public function  DiscountCalculator (Request $request)
    {
          $discount_code =  $_POST['discount_code'] ; // BAHAR98 --> discount_code  
         // $pk_product = $_POST['pk_product'] ;
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
            $product = Discount::select('pk_product')->where('discount_code', $discount_code)->first();
            $product_row = orderproduct::where([
            'pk_order' => $order->pk_order,
            'pk_product'=> $product->pk_product
            ])->first();


            //$product_price =  $product_row->total_price ;

            if($discount_row != null)
            {
                $product_price =  $product_row->Total_price ;
                $client = new \GuzzleHttp\Client();
                $response = $client->request('POST', 'https://learniaa.com/api/DateTime/CheckTarikhIsLastFromNow', [
                    'form_params' => [ 'DateRequest' => $discount_row->date_Expire ] ]);
                $response = $response->getBody()->getContents();
                $checkTarikh = json_decode( $response);
                    
                    if($discount_row->status =='فعال' && $checkTarikh == 'Valid' &&   $product_price >= $discount_row->minimum_buy )
                    {
                    /// $orderHistoryUserData = "";

                        if( $discount_row->limit == null)
                        {
                            /////
                            $price_discount = ( $discount_row->percent_discount / 100) * $product_price;  
                            if($discount_row->maxdiscount >= $price_discount )
                            {
                                $product_priceByDiscount = $product_price - $price_discount ;
                            }
                            else
                            {
                                $product_priceByDiscount = $product_price -  $discount_row->maxdiscount ;
                            }
                            $detail=array([
                                'type'=>'محصول محور',
                                'pk_product'=>$product->pk_product,
                                'price'=>$product_priceByDiscount
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
                                $price_discount = ( $discount_row->percent_discount / 100) * $product_price;  
                                if($discount_row->maxdiscount >= $price_discount )
                                {
                                    $product_priceByDiscount = $product_price - $price_discount ;
                                
                
                                }
                                else
                                {
                                    $product_priceByDiscount = $product_price -  $discount_row->maxdiscount ;
                                }
                                $detail=array([
                                    'type'=>'محصول محور',
                                    'pk_product'=>$product->pk_product,
                                    'price'=>$product_priceByDiscount
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
            $product_row = orderproduct::select ('pk_product','total_price')->where('pk_order' , $order->pk_order)->get();

            foreach($product_row as $price )
            {
                $total += $price->total_price;
            }
            $product_price =  $total ;
            if($discount_row != null)
            {
                
                $client = new \GuzzleHttp\Client();
                $response = $client->request('POST', 'https://learniaa.com/api/DateTime/CheckTarikhIsLastFromNow', [
                    'form_params' => [ 'DateRequest' => $discount_row->date_Expire ] ]);
                $response = $response->getBody()->getContents();
                $checkTarikh = json_decode( $response);
            
                    if($discount_row->status =='فعال' && $checkTarikh == 'Valid' &&   $product_price >= $discount_row->minimum_buy )
                    {
                    /// $orderHistoryUserData = "";

                        if( $discount_row->limit == null)
                        {
                            /////
                            $price_discount = ( $discount_row->percent_discount / 100) * $product_price;  
                            if($discount_row->maxdiscount >= $price_discount )
                            {
                                $product_priceByDiscount = $product_price - $price_discount ;
                            }
                            else
                            {
                                $product_priceByDiscount = $product_price -  $discount_row->maxdiscount ;
                            }

                            $detail=array([
                                'type'=>'عمومی',
                                'pk_product'=>'',
                                'price'=>$product_priceByDiscount
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
                                $price_discount = ( $discount_row->percent_discount / 100) * $product_price;  
                                if($discount_row->maxdiscount >= $price_discount )
                                {
                                    $product_priceByDiscount = $product_price - $price_discount ;
                                
                
                                }
                                else
                                {
                                    $product_priceByDiscount = $product_price -  $discount_row->maxdiscount ;
                                }
                                $detail=array([
                                    'type'=>'عمومی',
                                    'pk_product'=>'',
                                    'price'=>$product_priceByDiscount
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
    $product= product::find($id);
    $count = $product->download_count + 1;
    $product->download_count = $count;
    $product->save();

}

public function filter()
{
    $data = vote::get();
    return response()->json($data);

}


}
   

