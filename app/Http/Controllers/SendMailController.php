<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\ContactMail;

class SendMailController extends Controller
{
    public function SendContactMail(Request $request){
        $mailData = $this->validate($request,[
            'name' => 'required',
            'mobile' => 'required|numeric',
            'email' => 'required|email'
        ]);
        
        Mail::to($request->email)->send(new ContactMail($mailData));
        // Mail::to('')->send(new ContactMail($mailData));

        

    }
}
