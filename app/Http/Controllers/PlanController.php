<?php

namespace App\Http\Controllers;

use App\Models\PlanModel;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index() 
    {
        $plans = PlanModel::all();

        return response()->json($plans, 200);
    }
}
