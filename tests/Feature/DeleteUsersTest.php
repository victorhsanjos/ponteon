<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;

class DeleteUsersTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guests_can_delete_users()
    {
        factory(User::class)->create();

        $this->json('DELETE', '/users/1')
            ->assertStatus(Response::HTTP_NO_CONTENT);
        
        $this->assertDatabaseMissing('users', ['id' => 1]);
    }
}
