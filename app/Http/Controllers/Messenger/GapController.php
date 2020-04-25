<?php

namespace App\Http\Controllers\Messenger;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CustomClass\Gap;


class GapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function callback(Request $request)
    {
      //  $callback_data = json_decode(file_get_contents("php://input"), TRUE);

        $chatId = $_POST["chat_id"];
        $senderInfoArray = $_POST["from"];
        $type = $_POST["type"];
        $message = $_POST["data"];

        $token = '9c7aeb7a0c7094473db14efa0acbd684296fa54b4a6ebe41ced70f5c09ed215b';
        $gap = new Gap($token);
        $gap->sendAction($chatId, 'در حال ارسال پاسخ');

        if ($message == 'join')
         {
           $Info =  implode("__",$str) ;
           $w = $chatId . '-' . $type . '-'. $message . '-' .  $Info . '-' ;
         // $gap->sendText($chatId, "لطفا نام خود را  برای احراز هویت وارد نمایید");
         $gap->sendText($chatId, $w );
         }

        $myfile = fopen("GapMessengerLog.txt", "a");
      
        switch ($message)
         {
            case 'محمد ملک':
                fwrite($myfile, $chatId . '-');
               $gap->sendText($chatId, "اطلاعات شما ثبت شد");
                fclose($myfile);
                break;
            case 'شبنم شایگان':
                fwrite($myfile, $chatId . '-');
                $gap->sendText($chatId, "اطلاعات شما ثبت شد");
                fclose($myfile);
                break;
            case 'محمدرضا مهدوی':
                fwrite($myfile, $chatId . '-');
                $gap->sendText($chatId, "اطلاعات شما ثبت شد");
                fclose($myfile);
                break;
        }


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
