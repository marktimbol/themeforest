<?php

namespace App\Http\Controllers;

use App\Item;
use App\ShoppingCart;
use Illuminate\Http\Request;

class CartController extends Controller
{
	protected $cart;

	public function __construct(ShoppingCart $cart)
	{
		$this->cart = $cart;
	}

    public function index()
    {
    	$cart_items = $this->cart->content();
    	$cart_count = $this->cart->count();

        $subtotal = $this->cart->subtotal();
        $tax = $this->cart->tax();
        $total = $this->cart->total();
        
    	return view('public.cart', compact('cart_items', 'cart_count', 'subtotal', 'tax', 'total'));
    }

    public function store(Request $request)
    {
        $item = Item::findOrFail($request->id);
        $this->cart->add($item->id, $item->name, 1, $item->price);

        // return 'Item added to your cart.';

        return redirect()->back();

        // return redirect()->back()->with([
        //  'message'   => 'Item added to your cart.'
        // ]);
    }    
}
