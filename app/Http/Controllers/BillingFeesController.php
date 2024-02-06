<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BillingFeesController extends Controller
{
    public function store(Request $request) 
    {
        $request->validate([
            'id_gym' => 'required|integer',
            'identification' => 'required',
            'percentage' => 'required',
        ]);

        DB::beginTransaction();

        try {
            $billingFees = BillingFeesController::create($request->all());
        } catch (\Throwable $e) {
            DB::rollBack();

            return response()->json(['errors' => ['database' => [$e->getMessage()]]], 404);
        }

        DB::commit();

        return response()->json($billingFees, 201);
    }
}
