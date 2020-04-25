<?php

namespace App\CustomClass;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
class SmsSender 
{
  public function SendSms($mobile,$message)
  {
    $url = "https://ippanel.com/services.jspd";

            $rcpt_nm = array($mobile);
            $param = array
                        (
                            'uname'=>'09901918193',
                            'pass'=>'0020503679',
                            'from'=>'500010707',
                            'message'=> $message ,
                            'to'=>json_encode($rcpt_nm),
                            'op'=>'send'
                        );
                        
            $handler = curl_init($url);             
            curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($handler, CURLOPT_POSTFIELDS, $param);                       
            curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
            $response2 = curl_exec($handler);
            $response2 = json_decode($response2);
            $res_code = $response2[0];
            $res_data = $response2[1];
  }
}