<?php

namespace Tests\Browser\Item;

use App\Item;
use App\User;
use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class GuestUserCanAddAnItemOnTheCartTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function test_a_guest_user_can_add_an_item_on_the_cart()
    {
        $arksolutions = factory(User::class)->create([
            'username'  => 'arksolutions',
            'email' => 'support@arksolutions.me'
        ]);

        $item = factory(Item::class)->create([
            'user_id'   => $arksolutions->id,
            'name' => 'The Product Name',
            'slug'  => 'the-product-name',
            'description'   => 'The Product description',
            'price' => 900, // $9.00
        ]);

        $this->browse(function ($browser) use ($item) {
            $browser->visit("/items/$item->slug")
                ->press('Add to Cart');
                // ->assertSee('Item added to your cart.');

            // We'll make sure that the item exists
            // on the cart page.
            $browser->visit('/cart')
                ->assertSee('1 Item')
                ->assertSee('The Product Name');
        });
    }
}
