<?php

namespace App\Http\Controllers;

use App\Animal;
use App\Category;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagenumber = 4;
        $animals = Animal::with('category')->latest()->paginate($pagenumber);
        $i = (request()->input('page',1)-1)*$pagenumber;
        return view('admin.animal.index',
            compact('animals', 'i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.animal.create',compact('categories'));
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
            'category_id' => 'required',
            'image' => 'image|max:1999'
        ]);

        Animal::create([
            'name' => request('name'),
            'description' => request('description'),
            'status' => (request('status')==='1')?1:0,
            'category_id' => request('category_id'),
            'image' => Animal::uploadImage($request->file('image'))
        ]);

        return redirect()->route('animals.index')
        ->with('success','Category created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function show(Animal $animal)
    {
        return view('admin.animal.show',compact('animal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function edit(Animal $animal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Animal $animal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Animal $animal)
    {
        //
    }
}
