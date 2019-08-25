<?php

namespace App\Http\Controllers;

use App\State;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(State $state)
    {
        return response()->json($state->cities);
    }
}
