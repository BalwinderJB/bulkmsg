<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\VideoconSms;
use App\Phone;

class MessageController extends Controller
{
    public function index()
    {
        return view('contactForm');
    }
    public function msg(Request $request)
    {
        $input = $request->input();


        if(isset($input['phone'])){
            $comment = $input['phone'];
        }
        unset($input['phone']);
        $now = Carbon::now();

        $message = "HOLI MOVIES SPECIAL offer please click here http://valentine.clubjb.com/ ";
        $data = (new VideoconSms)->send(8699032766, $message, 'text', 'bird'); // send sms

        return redirect()->back();
    }

    public function bulkMsg()
    {
        $dat = Phone::select('phone')->get();

        $message = "HOLI MOVIES SPECIAL:\r\n\r\nGet upto Rs 300/- OFF on Purchase of 2 Movie Tickets + 1 Tub Popcorn + 2 Cola\r\n\r\nCall: 81960-81960, 81960-81962\r\n*T&C Apply(CLUBJB).";
//        dd($dat);

        foreach ($dat as $x)
        {
            (new VideoconSms())->send($x['phone'],$message,'text');

            Phone::where('phone', $x['phone'])->update(['status' => 1]);
        }

        return 'Done'. $dat;
    }
}
