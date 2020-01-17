<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DistanceApiController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $distance1, $distance2)
    {
        return $distance1 + $distance2;
    }
}
