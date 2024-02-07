<?php

namespace App\Http\Controllers;

use App\Models\BillingFeesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BillingFeesController extends Controller
{
    public function index()
    {
        $billingfees = BillingFeesModel::whereNull('deleted_at')->orderBy('created_at', 'desc')->get();
        
        return response()->json($billingfees, 200);
    }

    public function store(Request $request) 
    {
        $request->validate([
            'id_gym' => 'required|integer',
            'identification' => 'required',
            'type' => 'required',
            'percentage' => 'required',
        ]);

        DB::beginTransaction();

        try {
            $billingfees = BillingFeesModel::create($request->all());
        } catch (\Throwable $e) {
            DB::rollBack();

            return response()->json(['errors' => ['database' => [$e->getMessage()]]], 404);
        }

        DB::commit();

        return response()->json($billingfees, 201);
    }

    public function destroy($id)
    {
        $billingfees = BillingFeesModel::find($id);

        if ($billingfees === null) {
            return response()->json(['mensagem' => 'Taxa de Cobrança não encontrada.'], 404);
        }

        if ($billingfees->deleted_at !== null) {
            return response()->json(['mensagem' => 'Taxa de Cobrança já deletada.'], 404);
        }

        $billingfees->update([
            'deleted_at' => DB::raw('now()')
        ]);

        return response()->json(['mensagem' => 'Taxa de cobrança excluída com sucesso'], 200);
    }
}
