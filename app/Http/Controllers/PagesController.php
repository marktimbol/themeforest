<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
    	$items = Item::latest()->get();

    	return view('public.index', compact('items'));
    }
}
