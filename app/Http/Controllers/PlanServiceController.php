<?php

namespace App\Http\Controllers;

use App\Definitions\Plan\ServiceDefinition;
use App\Domains\Plan\ServiceDomain;

class PlanServiceController extends Controller implements ServiceDomain, ServiceDefinition
{
    public function index()
    {
        return response()->json([
            [
                'id' => self::SERVICE_ID_CABINET,
                'name' => self::SERVICE_NAME_CABINET,
            ],
            [
                'id' => self::SERVICE_ID_PARKING,
                'name' => self::SERVICE_NAME_PARKING,
            ],
            [
                'id' => self::SERVICE_ID_PHYSICAL_ASSESSMENT,
                'name' => self::SERVICE_NAME_PHYSICAL_ASSESSMENT,
            ],
            [
                'id' => self::SERVICE_ID_NUTRITIONIST,
                'name' => self::SERVICE_NAME_NUTRITIONIST,
            ]
        ], 200);
    }
}
