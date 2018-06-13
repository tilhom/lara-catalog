<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest()->paginate(5);
        $i = (request()->input('page',1)-1)*5;
        return view('admin.category.index', compact('categories','i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        request()->validate([
            'name' => 'required',
            'image' => 'image|max:1999'
        ]);

        Category::create([
            'name' => request('name'),
            'description' => request('description'),
            'status' => (request('status')==='1')?1:0,
            'image' => Category::uploadImage($request->file('image'))
        ]);

        return redirect()->route('categories.index')
        ->with('success','Category created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('admin.category.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        request()->validate([
            'name' => 'required'
        ]);
        if ($request->hasFile('image')) {
            // Delete the old picture
            Storage::delete('public/categories/'.$category->image);
            // Upload the new picture
            $nameToStore = Category::uploadImage($request->file('image'));
        } 
        $category->update([
        'name' => request('name'),
        'description' => request('description'),
        'status' => (request('status')==='1')?1:0,
        'image' => isset($nameToStore)?$nameToStore:$category->image
        ]);

        return redirect()->route('categories.index')
        ->with('success','Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if($category->image){
            Storage::delete('public/categories/'.$category->image);
        }
        $category->delete();
        return redirect()->route('categories.index')
        ->with('success','Category deleted successfully');
    }
}
