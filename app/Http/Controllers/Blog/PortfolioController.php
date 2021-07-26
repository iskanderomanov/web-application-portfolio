<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\BlogCategory;
use App\Models\Contact;
use Illuminate\Http\Request;

class PortfolioController extends MainController
{
    public function index(){
        return view('blog.portfolio.index', [
            'posts' => BlogPost::orderBy('created_at', 'desc')->paginate('9'),
            'categories' => BlogCategory::all(),
            'contacts' => Contact::all(),
        ]);
    }
}
