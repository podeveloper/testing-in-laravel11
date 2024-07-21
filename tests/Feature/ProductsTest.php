<?php

use App\Models\Product;
use App\Models\User;

use function Pest\Laravel\{get};
use function Pest\Laravel\{actingAs};

test('homepage contains empty table', function () {

    $user = User::factory()->create();

    actingAs($user)->get('/products')
        ->assertStatus(200)
        ->assertSee(__('No products found'));
});


test('homepage contains non empty table', function () {
    Product::create([
        'name'  => 'Product 1',
        'price' => 123,
    ]);

    $user = User::factory()->create();

    actingAs($user)->get('/products')
        ->assertStatus(200)
        ->assertDontSee(__('No products found'));
});
