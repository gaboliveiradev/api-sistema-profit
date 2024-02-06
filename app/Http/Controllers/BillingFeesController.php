<?php

namespace App\Http\Controllers;

use App\Models\BillingFeesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BillingFeesController extends Controller
{
    public function index()
    {
        $billingsFees = BillingFeesModel::whereNull('deleted_at')->orderBy('created_at', 'desc')->get();
        
        return response()->json($billingsFees, 200);
    }

    public function store(Request $request) 
    {
        $request->validate([
            'id_gym' => 'required|integer',
            'identification' => 'required',
            'percentage' => 'required',
        ]);

        DB::beginTransaction();

        try {
            $billingFees = BillingFeesModel::create($request->all());
        } catch (\Throwable $e) {
            DB::rollBack();

            return response()->json(['errors' => ['database' => [$e->getMessage()]]], 404);
        }

        DB::commit();

        return response()->json($billingFees, 201);
    }
}
