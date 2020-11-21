<?php

namespace App\Http\Controllers\Messenger;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Telegram\Bot\Api;
use GuzzleHttp\Client;
use Telegram\Bot\Laravel\Facades\Telegram;
class TelegrambotController extends Controller
{
    //
    function send($id, $text)
    {
        $telegram = new \Telegram\Bot\Api('1451995777:AAHQsFmo7HvPz6fk_3sNOJFDAl08XdnkxNQ');
        $response = $telegram->sendMessage(['chat_id' => $id, 'text' => $text]);
    }

    public function index()
    {

        $update = json_decode(file_get_contents("php://input"), TRUE);

        $chatId = $update["message"]["chat"]["id"];
        $message = $update["message"]["text"];


        $telegram = new \Telegram\Bot\Api('1228780312:AAGGzp9Pbs6VNv1D_F7ZGWXC1qIlbLf8Avc');


        $response = Telegram::getMe();
        //$this->send($chatId, " لطفا نام خود را وارد کنید..");
        $botId = $response->getId();
        //dd($botId);
        $firstName = $response->getFirstName();
        $username = $response->getUsername();

        //$start='off';
        if ($message == '/start') {
            //$start ='on';
            $this->send($chatId, " لطفا نام خود را وارد کنید..");
        }
       

       
        

        
    }

}
