<?php

namespace App\Http\Controllers;

use App\Mail\NewsletterMail;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class NewsletterController extends Controller
{
    //
    public function subscribe(Request $request){
        $request->validate([
            'email'=>'required|email|unique:newsletters,email',
        ]);
        Newsletter::create([
            'user_id'=>Auth::user()->id,
            'email'=> $request->email,
            'created_at'=>now()
        ]);

        Mail::to($request->email)->send(new NewsletterMail($request->email));

        return back()->with('newsletter','Thank you for subscribing! A confirmation email has been sent to your inbox.');
    }
}
