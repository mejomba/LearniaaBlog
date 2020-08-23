<?php

namespace App\Http\Controllers\Messenger;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CustomClass\Gap;
use App\Category;
use App\Blog;
use App\User; 

class GapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function callback(Request $request)
    {
        $message = $_POST['data'];
        $chatId =  $_POST['chat_id'];
        $type = $_POST['type'];
        
        $token = '9c7aeb7a0c7094473db14efa0acbd684296fa54b4a6ebe41ced70f5c09ed215b';
        $gap = new Gap($token);

        if ( $type == 'text' && $message == '/getmyinfo' ) 
        {
            foreach ($_POST as $param_name => $param_val)
            {
               $gap->sendText("+989300471406", $param_name . '-' . $param_val);
            }
        }

        if ( $type == 'text' && $message == '/listdraftpost' ) 
        {
            $results = Blog::where('status','پیش نویس')->select('pk_blog', 'title','status')->get();
          
            foreach($results as $one_post)
            { 
                $gap->sendText("+989300471406", $one_post['pk_blog'].'=='.$one_post['title']); 
            }
          
        }

        
        if ( $type == 'text') 
        {
            $post = Blog::find($message);
            $post->status = "انتشار";
            $post->save();
          
            $gap->sendText($post->title);  
            $gap->sendText("+989300471406", "پست منتشر شد");   
        }


    }

    
}
