<?php

namespace App\Http\Controllers;

use App\Definitions\Modality\ModalityDefinition;
use App\Domains\Modality\ModalityDomain;
use Illuminate\Http\Request;

class ModalityController extends Controller implements ModalityDomain, ModalityDefinition
{
    public function index()
    {
        return response()->json([
            [
                'id' => self::MODALITY_ID_GENERAL,
                'name'=> self::MODALITY_NAME_GENERAL,
                'img' => '../../../assets/icon/corrida.svg',
            ],
            [
                'id' => self::MODALITY_ID_BODYBUILDING,
                'name'=> self::MODALITY_NAME_BODYBUILDING,
                'img' => '../../../assets/icon/biceps.svg',
            ],
            [
                'id' => self::MODALITY_ID_FUNCTIONAL,
                'name'=> self::MODALITY_NAME_FUNCTIONAL,
                'img' => '../../../assets/icon/agachamento.svg',
            ],
            [
                'id' => self::MODALITY_ID_CROSSFIT,
                'name'=> self::MODALITY_NAME_CROSSFIT,
                'img' => '../../../assets/icon/crossfit.svg',
            ],
        ]);
    }
}
