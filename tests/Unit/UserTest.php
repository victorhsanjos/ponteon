<?php

namespace Tests\Unit;

use App\City;
use App\State;
use App\User;
use Carbon\Carbon;
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

    /** @test */
    public function display_city_and_state()
    {
        $pernambuco = factory(State::class)->create(['name' => 'Pernambuco', 'abbreviation' => 'PE']);
        $recife = factory(City::class)->create(['name' => 'Recife', 'state_id' => $pernambuco->id]);
        $user = factory(User::class)->create(['city_id' => $recife->id]);

        $this->assertEquals('Recife / PE', $user->display_city_state);
    }

    /** @test */
    public function display_created_at()
    {
        $dateTime = Carbon::create(2019, 01, 21, 10, 20);
        
        Carbon::setTestNow($dateTime);

        $user = factory(User::class)->create();

        $this->assertEquals('21/01/2019 10:20', $user->display_created_at);
    }
}
