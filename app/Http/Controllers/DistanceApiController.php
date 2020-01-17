<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DistanceApiController extends Controller
{
    const YARD_TO_METER = 0.9144;
    const METER_TO_YARD = 1.0936133;

    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $unit1, $distance1, $unit2, $distance2, $outputUnit)
    {
        if (!$this->checkUnit($unit1)) {
            return "Unit type 1 is not understood valid values [y/m] given value [$unit1]";
        }
        if (!$this->checkUnit($unit2)) {
            return "Unit type 2 is not understood valid values [y/m] given value [$unit2]";
        }
        if (!$this->checkUnit($outputUnit)) {
            return "Unit type output is not understood valid values [y/m] given value [$unit1]";
        }
        $distanceInMeters = $this->addDistance($unit1, $distance1, $unit2, $distance2);
        if($outputUnit == 'y') {
            $distance = $distanceInMeters * self::METER_TO_YARD;
        } else {
            $distance = $distanceInMeters;
        }
        return $distance . $outputUnit;
    }

    protected function addDistance($unit1, $distance1, $unit2, $distance2)
    {
        if($unit1 == 'y') {
            $distance1 = $this->YardToMeter($distance1);
        }
        if($unit2 == 'y') {
            $distance2 = $this->YardToMeter($distance2);
        }
        return $distance1 + $distance2;
    }

    protected function YardToMeter($distance) {
        return $distance * self::YARD_TO_METER;
    }

    /**
     * Check if the given unit type is recognized.
     * @param string $unit
     * @return bool
     */
    protected function checkUnit(string $unit): bool
    {
        $units = ['y', 'm'];
        return in_array($unit, $units);
    }
}
