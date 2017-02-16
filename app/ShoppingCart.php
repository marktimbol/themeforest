<?php

namespace App;

use Gloudemans\Shoppingcart\Facades\Cart;

class ShoppingCart
{
	public function add($id, $name, $quantity = 1, $price)
	{		
		return Cart::add($id, $name, $quantity, $price);
	}

	public function count()
	{
		return Cart::count();
	}
	
	public function content()
	{
		return Cart::content();
	}
}