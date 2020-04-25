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
use Verta;

class ApiController extends Controller
{
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
          $pk_product = $_POST['pk_product'] ;
        
          if(isset($_POST['user']) != TRUE )
          {           
            return response()->json('login required');

          }
          $pk_user=$_POST['user'];
          
         $discount_row = Discount::where('discount_code', $discount_code)->first();
         $product_row = Product::where('pk_product', $pk_product)->first();
         $product_price =  $product_row->price ;

         if($discount_row != null)
        {
        // $checkTarikh =  $this->CheckTarikhIsLastFromNow($discount_row->date_Expire);
        $checkTarikh = TRUE ;

                if($discount_row->status =='فعال' && $checkTarikh == TRUE &&   $product_price >= $discount_row->minimum_buy )
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

                         return response()->json($product_priceByDiscount);
                    }
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
                            return response()->json($product_priceByDiscount);

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
       
 /*  Common & INFO API's   */   
 public function DateTimeGetNow()
 {
    $verta = Verta::now();
    $date =  substr($verta->year,2) . '/' . $verta->month . '/' .    $verta->day ;
    return response()->json($date);
  
 }

 /*  Common & INFO API's   */  
}
   

