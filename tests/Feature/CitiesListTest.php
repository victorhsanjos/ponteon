<?php

namespace Tests\Feature;

use App\City;
use App\State;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CitiesListTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function cities_associated_with_the_state()
    {
        $pernambuco = factory(State::class)->create(['name' => 'Pernambuco', 'abbreviation' => 'PE']);
        $ceara = factory(State::class)->create(['name' => 'Ceará', 'abbreviation' => 'CE']);

        $recife = factory(City::class)->create(['name' => 'Recife', 'state_id' => $pernambuco->id]);
        $fortaleza = factory(City::class)->create(['name' => 'Fortaleza', 'state_id' => $ceara->id]);

        $this->json('GET', "/state/{$pernambuco->id}/cities")
            ->assertSuccessful()
            ->assertJson(collect([$recife])->toArray())
            ->assertJsonMissing(collect([$fortaleza])->toArray());
    }
}
