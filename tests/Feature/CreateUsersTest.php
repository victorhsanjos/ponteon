<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guests_can_create_users()
    {
        $user = factory(User::class)->raw();

        $this->json('POST', '/users', $user)
            ->assertSuccessful();
            
        $this->assertDatabaseHas('users', $user);
    }

    /** @test */
    public function a_user_requires_all_fields()
    {
        $this->json('POST', '/users')
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJsonValidationErrors([
                'name' => 'O campo Nome Completo é obrigatório.', 
                'email' => 'O campo E-mail é obrigatório.', 
                'cellphone' => 'O campo Celular é obrigatório.', 
                'city_id' => 'O campo Cidade é obrigatório.'
            ]);
    }

    /** @test */
    public function a_user_requires_a_unique_email()
    {
        $user = factory(User::class)->create();

        $this->json('POST', '/users', $user->toArray())
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJsonValidationErrors([
                'email' => 'O campo E-mail já está sendo utilizado.', 
            ]);
    }

    /** @test */
    public function a_user_requires_a_unique_cellphone()
    {
        $user = factory(User::class)->create();

        $this->json('POST', '/users', $user->toArray())
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJsonValidationErrors([
                'cellphone' => 'O campo Celular já está sendo utilizado.', 
            ]);
    }
}
