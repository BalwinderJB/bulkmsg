<?php
namespace App;

interface SmsInterface
{
    public function send($recipient, $message, $messageType = 'text');

}