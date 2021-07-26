<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.post.index', [
            'categories' => BlogCategory::with('children')->where('parent_id','=', '0')->get(),
            'users' => $users,
            'posts' => BlogPost::withTrashed()->orderBy('created_at', 'desc')->paginate(10),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('admin.post.create', [
            'portfolio' => [],
            'user'   => [],
            'users' => $users,
            'categories' => BlogCategory::with('children')->where('parent_id','=', '0')->get(),
            'delimiter'  => '',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request['published_at'] = ($request['published_status']== '1') ? date("Y-m-d H:i:s") : null;
        $input = $request->all();
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }


        BlogPost::create($input);
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogPost  $post
     * @return \Illuminate\Http\Response
     */
    public function show(BlogPost $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogPost  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogPost $post)
    {
        $users = User::all();
        return view('admin.post.edit',[
            'post' => $post,
            'user'   => [],
            'users' => $users,
            'categories' => BlogCategory::with('children')->where('parent_id','=', '0')->get(),
            'delimiter'  => '',]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogPost  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogPost $post)
    {

        $request['published_at'] = ($request['published_status']== '1') ? date("Y-m-d H:i:s") : null;
        $input = $request->all();
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }


        $post->update($input);
        return redirect()->route('post.index');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogPost  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogPost $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }
    public function restore($id,BlogPost $post)
    {
        $post::withTrashed()->find($id)->restore();
        return redirect()->route('post.index');
    }
}
