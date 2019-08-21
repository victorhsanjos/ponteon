<?php

namespace Tests\Unit;

use App\State;
use Illuminate\Database\Eloquent\Collection;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StateTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_state_has_cities()
    {
        $state = factory(State::class)->create();
        
        $this->assertInstanceOf(Collection::class, $state->cities);
    }
}
