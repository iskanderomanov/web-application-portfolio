<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class PersonController extends MainController
{
    public function index(){
        return view('blog.person.index', [
            'contacts' => Contact::all(),
        ]);
    }
}
