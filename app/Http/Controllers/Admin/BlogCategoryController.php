<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends MainController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.category.index', [
            'categories' => BlogCategory::withTrashed()->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create', [
            'category'   => [],
            'categories' => BlogCategory::with('children')->where('parent_id', '0')->get(),
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
        BlogCategory::create($request->all());
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogCategory  $category
     * @return \Illuminate\Http\Response
     */
    public function show(BlogCategory $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogCategory  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogCategory $category)
    {
        return view('admin.category.edit', [
            'category'   => $category,
            'categories' => BlogCategory::with('children')->where('parent_id', '0')->get(),
            'delimiter'  => '',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogCategory  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogCategory $category)
    {
        $category->update($request->except('slug'));
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogCategory  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogCategory $category)
    {
        $category->delete();
        return redirect()->route('category.index');
    }
    public function restore($id,BlogCategory $category)
    {
        $category::withTrashed()->find($id)->restore();
        return redirect()->route('category.index');
    }
}
