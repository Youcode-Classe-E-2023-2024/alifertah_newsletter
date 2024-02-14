<?php

namespace App\Http\Controllers;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Envelope;

use App\Models\Email;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Support\Facades\Mail;

class NewsLetterController extends Controller
{
    public function subscribe(Request $r){
        // $r->validate([
        //     'email' => 'required|email|unique:emails, email',
        // ]);
        Mail::mailer('')->to($r->email);
        $email = new Email();
        $email->email = $r->input('email');
        $email->save();

        return redirect()->back()->with('success', "You have been subscribed to the news letter");
    }

    public function newsLetterEditor(){
        return view("newsLetterEditor");
    }
}
