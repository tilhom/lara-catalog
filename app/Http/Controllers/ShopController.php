<?php

namespace App\Http\Controllers;

use App\Animal;
use App\Category;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
    	$animals = Animal::with('category')->inRandomOrder()->take(6)->get();
    	return view('shop.index',compact('animals'));
    }

    public function show($cslug,$aslug)
    {
    	$animal = Animal::whereSlug($aslug)->firstOrFail();
    	return view('shop.show',compact('animal'));
    }
    public function showcat($cslug)
    {
    	$animals = Category::whereSlug($cslug)->firstOrFail()->animals()->with('category')->simplePaginate(6);
    	return view('shop.index',compact('animals'));
    }

    public function search(Request $request)
    {
        $query = $request->get('query');
         $result = Animal::where('name', 'like', "%{$query}%")->
        orWhere('description', 'like',"%{$query}%")->
        orWhere('price', 'like', "%{$query}%")->paginate(2);
        // dump($result);

        //return redirect()->route('rs',$query);
        return view('search',compact('result','query'));
    } 
     public function rsearch($query)
    {
        $result = Animal::where('name', 'like', "%{$query}%")->
        orWhere('description', 'like',"%{$query}%")->
        orWhere('price', 'like', "%{$query}%")->paginate(3);
        //dump($result);
        return view('search',compact('result','query'));
    }
}
