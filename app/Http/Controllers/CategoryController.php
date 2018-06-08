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
            'image' => 'required|image|max:1999'
        ]);
        $uploadedImage = $this->uploadfile($request->file('image'));
        Category::create([
            'name' => request('name'),
            'description' => request('description'),
            'status' => (request('status')==='1')?1:0,
            'image' => $uploadedImage
        ]);

        return redirect()->route('categories.index')
                        ->with('success','Category created successfully.');
    }

    protected function uploadfile($image)
    {
        // Get filename with extension
      $filenameWithExt = $image->getClientOriginalName();

      // Get just the filename
      $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

      // Get extension
      $extension = $image->getClientOriginalExtension();

      // Create new filename
      $filenameToStore = $filename.'_'.time().'.'.$extension;

      // Uplaod image
      $path= $image->storeAs('public/categories/', $filenameToStore);
      return $filenameToStore;
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

        $category->update([
            'name' => request('name'),
            'description' => request('description'),
            'status' => (request('status')==='1')?1:0
        ]
        );

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
         if(Storage::delete('public/categories/'.$category->image)){
            $category->delete();
            return redirect()->route('categories.index')
                        ->with('success','Category deleted successfully');
         }
        dd('Destroy delete');
    }
}
