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

    public function show(Item $item)
    {
    	return view('public.items.show', compact('item'));
    }

    public function store(Request $request)
    {
    	$item = Item::findOrFail($request->id);
    	$this->cart->add($item->id, $item->name, 1, $item->price);

    	return 'Item added to your cart.';

    	// return redirect()->back()->with([
    	// 	'message'	=> 'Item added to your cart.'
    	// ]);
    }
}
