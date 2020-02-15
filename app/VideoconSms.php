<?php

namespace App;

class VideoconSms implements SmsInterface{

    private $senderID,$userName,$password;
    // private $baseURL = 'https://bulksmsapi.videoconsolutions.com/';
    private $baseURL = 'https://bulksmsapi.vispl.in/';

    public function __construct()
    {
//        $this->senderID = env('VIDEOCON_SMS_SENDER_ID');
//        $this->userName = env('VIDEOCON_SMS_USERNAME');
//        $this->password = env('VIDEOCON_SMS_PASSWORD');

        $this->senderID = 'CLUBJB';
        $this->userName = 'abhishektrans';
        $this->password = 'abhishektrans@123';


    }
    public function send($recipient, $message, $messageType = 'text', $messageFrom = '')
    {

//        dd($this->senderID);
        if ($this->senderID && $this->userName && $this->password) {

            if($messageFrom == 'deal_response'){
                $messageToSend = urlencode( "Thanks for choosing {$this->senderID}.\r\n\r\n".$message ."\r\n\r\nEnjoy your deal and have a nice day.\r\n\r\nFor any queries please call 81960-81960 from 10:00 a.m to 6:00 p.m");
            }elseif($messageFrom == 'bird'){
                $messageToSend = urlencode($message. "\r\n\r\nThanks for choosing {$this->senderID} to protect birds.\r\n\r\n" );
            }else{
                $messageToSend = urlencode($message . "\r\n\r\nThank you for choosing {$this->senderID}.");
            }

            $params = "?username={$this->userName}"
                . "&"
                . "password={$this->password}"
                . "&"
                . "messageType={$messageType}"
                . "&"
                . "mobile={$recipient}"
                . "&"
                . "senderId={$this->senderID}"
                . "&"
                . "message={$messageToSend}";

            $requestURL = $this->baseURL . $params;

            $sslInfo = [
                "ssl" => [
                    "verify_peer"      => false,
                    "verify_peer_name" => false,
                ],
            ];
            $cxContext = stream_context_create($sslInfo);

            $resp['request'] = $requestURL;

            $resp['response'] = file_get_contents($requestURL, false, $cxContext);

            return $resp;

        } else {
            return [
                'response' => "INCORRECT Credentials",
            ];
        }
    }
}

