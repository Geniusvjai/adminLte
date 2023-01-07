<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ContactController extends Controller
{
    
    public function ContactPage(){
        return view('site.contact');
    }

    public function ShopContactForm(Request $request){
        
        $request->validate([
            'web_name'=>'required',
            'web_email'=>'required|email',
            'web_subject'=>'required',
            'web_message'=>'required',
        ]);

        $token = Str::random(64);
        DB::table('contact_us_form')->insert([
            'name' => $request->web_name,
            'email' => $request->web_email,
            'subject' => $request->web_subject,
            'message' => $request->web_message,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);
        session()->put('email', $request->web_email);

        $body = [
                    'Name' => $request->web_name,
                    'Email' => $request->web_email,
                    'Subject' => $request->web_subject,
                    'Message' => $request->web_message,
        ];

        Mail::send('Site.email-template', $body, function ($message) use ($request) {
            $message->from('noreply@example.com', 'UniqueKart Shop');
            $message->to('premprakash.nbt@outlook.com', $request->web_name)->subject($request->subject);    
        });

        return back()->with('success', 'Your Form is Submitted Successfully!');
    }


    public function sendFormRegistration(Request $request){
        return "Form Submitted";
    }

}


