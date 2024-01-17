<?php

namespace App\Http\Controllers;

use App\Models\PlanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlanController extends Controller
{
    public function index() 
    {
        $plans = PlanModel::all();

        return response()->json($plans, 200);
    }

    public function store(Request $request) 
    {
        $request->validate([
            'description' => 'required|string',
            'days' => 'required|string',
            'price' => 'required|string',
        ]);

        DB::beginTransaction();

        try {
            $plans = PlanModel::create($request->all());
        } catch (\Throwable $e) {
            DB::rollBack();

            return response()->json(['errors' => ['database' => [$e->getMessage()]]], 404);
        }

        DB::commit();

        return response()->json($plans, 201);
    }
}
