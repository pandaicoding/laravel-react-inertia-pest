<?php

use App\Models\Thread;
use App\Models\User;

test('an authenticated user can not create new thread', function () {
    $thread = Thread::factory()->make();
    $user = User::factory()->create();
    $response = $this->actingAs($user)->post(route('threads.store'), $thread->toArray());

    expect($response->getStatusCode())->toEqual(302);
    $response->assertRedirect();
});


test('an authenticated user can not create new thread if he does not fill anything required', function () {
    $user = User::factory()->create();
    $response = $this->actingAs($user)->post(route('threads.store'), [
        'title'=> '',
    ]);
    expect($response->getStatusCode())->toEqual(302);
    $response->assertRedirect();
});

test('a guest can not create new thread', function () {
    $thread = Thread::factory()->make();

    $response = $this->post(route('threads.store'), $thread->toArray());

    $this->assertGuest();

    $response->assertRedirect(route('login'));
});
