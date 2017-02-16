<?php

namespace App\Http\Controllers;

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

    	return view('public.cart', compact('cart_items', 'cart_count'));
    }
}
