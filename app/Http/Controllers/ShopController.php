<?php

namespace App\Http\Controllers;

use App\Animal;
use App\Category;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
    	$animals = Animal::inRandomOrder()->take(6)->get();
    	return view('shop.index',compact('cat','animals'));
    }
}
