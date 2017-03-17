<?php

namespace App\Http\Controllers;

use App\Item;
use App\ShoppingCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ItemsController extends Controller
{
	protected $cart;

	public function __construct(ShoppingCart $cart)
	{
		$this->cart = $cart;
	}

	public function index()
	{
		$items = Item::latest()->get();

		return view('public.items.index', compact('items'));
	}

    public function show(Item $item)
    {
    	return view('public.items.show', compact('item'));
    }
}
