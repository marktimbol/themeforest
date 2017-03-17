<?php

namespace Tests\Feature\Guest;

use App\Item;
use App\User;
use Tests\TestCase;
use App\ShoppingCart;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class GuestUserCanAddAnItemOnTheCartTest extends TestCase
{
	use DatabaseMigrations;

	public function setUp()
	{
		parent::setUp();

		$this->cart = new ShoppingCart;
	}

    public function test_a_guest_user_can_add_an_item_on_the_cart()
    {
    	$owner = factory(User::class)->create();

    	$item = factory(Item::class)->create([
    		'user_id'	=> $owner->id,
    		'name'	=> 'The Product Name',
    		'slug'	=> 'the-product-name',
    		'description'	=> 'The Product description',
    		'price'	=> 900, // $9.00
    	]);

    	// Add item to Cart
    	$request = $this->post('/cart', [
    		'id'	=> $item->id,
    	]);
    	
    	$this->assertEquals(1, $this->cart->count());
    }
}
