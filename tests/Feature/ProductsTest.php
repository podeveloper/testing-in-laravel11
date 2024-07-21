<?php

use App\Models\User;

use function Pest\Laravel\{actingAs};

test('homepage contains empty table', function () {

    $user = User::factory()->create();

    actingAs($user)->get('/products')
        ->assertStatus(200)
        ->assertSee(__('No products found'));
});
