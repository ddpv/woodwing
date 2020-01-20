<?php

namespace Tests\Feature;

use PHPUnit\Framework\TestCase;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DistanceApiControllerTest extends DuskTestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testDistanceApiController()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://localhost:8000/api/distance/m/1/m/0/m')
                ->assertSee('1m');
            $browser->visit('http://localhost:8000/api/distance/m/1/m/0/y')
                ->assertSee('1.0936133y');
            $browser->visit('http://localhost:8000/api/distance/m/1/m/1/m')
                ->assertSee('2m');
        });
    }
}
