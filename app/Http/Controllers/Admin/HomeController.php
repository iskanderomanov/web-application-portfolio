<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\Contact;
use Illuminate\Http\Request;

class HomeController extends MainController
{
    public function index(){
        $posts_count = BlogPost::all()->count();
        $category_count = BlogCategory::all()->count();
        $contact_count = Contact::all()->count();
        return view('admin.home.index', [
            'posts_count' => $posts_count,
            'category_count' => $category_count,
            'contact_count' => $contact_count,
        ]);
    }


}
