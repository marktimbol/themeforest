<?php

namespace Tests\Browser\Cart;

use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AuthenticatedUserCanPurchaseAnItemTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function test_an_authenticated_user_can_purchase_an_item_test()
    {
        $customer = factory(\App\User::class)->create([
            'name'  => 'Customer',
            'email' => 'customer@example.com'
        ]);

        $seller = factory(\App\User::class)->create([
            'name'  => 'Seller',
            'email' => 'seller@example.com'
        ]);

        $item = factory(\App\Item::class)->create([
            'user_id'   => $seller->id,
            'name'  => '3D Design',
            'price' => 900,
        ]);

        $this->browse(function ($browser) use ($customer, $seller, $item) {
            $browser->loginAs($customer)
                ->visit("/items/$item->slug")
                ->press("Add to Cart");

            $browser->visit('/cart')
                ->assertSee('3D Design')

                ->clickLink('Checkout')
                ->assertPathIs('/checkout')
                ->assertSee('Billing Details')
                ->assertSee('Order Summary')
                ->assertSee('3D Design');
        });
    }
}
