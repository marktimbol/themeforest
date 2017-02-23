<?php

namespace App\Http\Controllers;

use App\ShoppingCart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    protected $cart;

    public function __construct(ShoppingCart $cart)
    {
        $this->cart = $cart;
    }

    public function index()
    {
        $items = $this->cart->content();
        $subtotal = $this->cart->subtotal();
        $tax = $this->cart->tax();
        $total = $this->cart->total();

    	return view('public.billing.checkout', compact('items', 'subtotal', 'tax', 'total'));
    }

    public function store(Request $request)
    {
    	try {
	    	$user = auth()->user()->charge($this->cart->totalInDollars(), [
	    		'source'	=> $request->stripeToken
	    	]);
    	} catch (Exception $e) {
    		//
    	}

        return 'Done';

    }
}
