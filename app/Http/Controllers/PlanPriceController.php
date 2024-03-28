<?php

namespace App\Http\Controllers;

use App\Definitions\Plan\PriceDefinition;
use App\Domains\Plan\PriceDomain;
use Illuminate\Http\Request;

class PlanPriceController extends Controller implements PriceDomain, PriceDefinition
{
    public function index()
    {
        return response()->json([
            [
                'id' => self::FREQUENCY_ID_MONTHLY,
                'name'=> self::FREQUENCY_NAME_MONTHLY,
            ],
            [
                'id' => self::FREQUENCY_ID_BIMONTHLY,
                'name'=> self::FREQUENCY_NAME_BIMONTHLY,
            ],
            [
                'id' => self::FREQUENCY_ID_QUARTERLY,
                'name'=> self::FREQUENCY_NAME_QUARTERLY,
            ],
            [
                'id' => self::FREQUENCY_ID_SEMESTER,
                'name'=> self::FREQUENCY_NAME_SEMESTER,
            ],
            [
                'id' => self::FREQUENCY_ID_YEARLY,
                'name'=> self::FREQUENCY_NAME_YEARLY,
            ],
        ]);
    }
}
