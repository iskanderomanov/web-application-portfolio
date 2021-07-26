<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FeedbackController extends MainController
{
    public function index()
    {
        return view('blog.feedback.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function sending(Request $request)
    {
        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'body' => $request->message
        ];
        Mail::to('iskanderomanovv@gmail.com')->send(new \App\Mail\Mail($details));
        dd("Email is Sent.");
        return redirect()->route('/');
    }
}
