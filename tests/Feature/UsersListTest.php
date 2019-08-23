<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersListTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guests_can_create_users()
    {
        factory(User::class, 10)->create();

        $this->json('GET', '/users')
            ->assertSuccessful()
            ->assertJson([
                'data' => User::all()->toArray()
            ]);

    }
}
