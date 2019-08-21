<?php

namespace Tests\Unit;

use App\City;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_belongs_to_a_city()
    {
        $user = factory(User::class)->create();

        $this->assertInstanceOf(City::class, $user->city);
    }
}
