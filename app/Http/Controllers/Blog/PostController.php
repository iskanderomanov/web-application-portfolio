<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\BlogCategory;
use App\Models\Contact;
use Illuminate\Http\Request;

class PostController extends MainController
{
    public function index($post_slug){
        return view('blog.post.index', [
            'post' => BlogPost::where('slug', $post_slug)->firstOrFail(),
            'categories' => BlogCategory::all(),
            'contacts' => Contact::all(),
        ]);
    }
}
