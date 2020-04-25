<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use App\Category;
use App\Post;
use App\User;
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

    public function index()
    {
         $results = Post::where('status','انتشار')->
        paginate(6,['pk_post','pk_categories','title','pk_writers','pic_content','extras']) ;    
        return  $results ;
    }

    public function postsByCategory($categoryOfPage)
    {
        return Post::where('status','انتشار')->where('pk_categories',$categoryOfPage)->
        paginate(6,['pk_post','pk_categories','title','pk_writers','pic_content','extras']) ;     
    }
    

    public function writer($id)
    {
        return json_encode( User::where('pk_users',$id)->first() );
    }


    public function Category_store(Request $request)
    {
            $category = new Category();
            $category->type = $_POST['type']  ;
            $category->name = $_POST['name']  ;
            $category->desc = $_POST['desc']  ;
           

                if($category->save())
                {
                    $response = [ 
                        'success' => true,
                        'data'    =>  $category ,
                        'message' => 'success',
                     ];

                     return $response;
                }
                else
                {
                    $response = [
                        'success' => false,
                        'data'    => '',
                        'message' => 'Error Insert & Database',
                     ];

                     return json_encode($response) ;
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
