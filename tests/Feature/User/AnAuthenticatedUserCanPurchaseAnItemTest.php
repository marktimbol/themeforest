<?php

namespace Tests\Feature\User;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AnAuthenticatedUserCanPurchaseAnItemTest extends TestCase
{
	use DatabaseMigrations;

    public function test_a_guest_user_can_add_an_item_on_the_cart()
    {
    	$arksolutions = factory(App\User::class)->create([
    		'username'	=> 'arksolutions',
    		'email'	=> 'support@arksolutions.me'
    	]);

    	$item = factory(App\Item::class)->create([
    		'user_id'	=> $arksolutions->id,
    		'title'	=> 'The Product Name',
    		'slug'	=> 'the-product-name',
    		'description'	=> 'The Product description',
    		'price'	=> 900, // $9.00
    	]);

    	// Add item to Cart
    	$request = $this->post("/item/$item->slug");
    	
    }
}
