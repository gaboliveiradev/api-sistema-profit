<?php

namespace App\Http\Controllers;

use App\Definitions\Plan\ModalityDefinition;
use App\Domains\Plan\ModalityDomain;

class PlanModalityController extends Controller implements ModalityDomain, ModalityDefinition
{
    public function index()
    {
        return response()->json([
            [
                'id' => self::MODALITY_ID_GENERAL,
                'name'=> self::MODALITY_NAME_GENERAL,
            ],
            [
                'id' => self::MODALITY_ID_BODYBUILDING,
                'name'=> self::MODALITY_NAME_BODYBUILDING,
            ],
            [
                'id' => self::MODALITY_ID_FUNCTIONAL,
                'name'=> self::MODALITY_NAME_FUNCTIONAL,
            ],
            [
                'id' => self::MODALITY_ID_CROSSFIT,
                'name'=> self::MODALITY_NAME_CROSSFIT,
            ],
        ]);
    }
}
