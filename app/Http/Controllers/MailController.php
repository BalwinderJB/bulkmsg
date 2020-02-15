<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\User;

class MailController extends Controller
{
    public function sendEmail(Request $request)
    {
        $user=User::all();
        Mail::queue('send', ['user' => $user],

        function($m) use ($user)
        {
        foreach ($user as $user)
        {
        $m->to($user->email)->subject('Email Confirmation');
        }
        });
    }
}
