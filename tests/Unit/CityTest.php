<?php

namespace Tests\Unit;

use App\City;
use App\State;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CityTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_belongs_to_a_state()
    {
        $city = factory(City::class)->create();

        $this->assertInstanceOf(State::class, $city->state);
    }
}
