<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Session;

class MailController extends Controller
{
    //
    public function contact()
    {
    	return view('emails.contact');
    }

    // send mail
    public function send(Request $request)
    {
    	$validation = [

    		'name' => ['required', 'max:30'],
    		'email' => ['required', 'max:50', 'email'],
    		'subject' => ['required', 'max:50'],
    		'mail_message' => ['required', 'max:1500'],
    	];

    	$this->validate($request, $validation);

    	$data = [

    		'name' => $request->name,
    		'email' => $request->email,
    		'subject' => $request->subject,
    		'mail_message' => $request->mail_message,
    	];

    	Mail::send('emails.send', $data, function($message) {
    		$message->to('kennyresume@gmail.com', 'Kennice')->subject('Mail Received From ObiomaBlog');
    	});

    	Session::flash('contact_form_sent', 'Your Message has been Sent & well will get back to you Shortly...');

    	return redirect('/');
    }
}
