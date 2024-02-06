<?php

namespace App\Http\Controllers;

use App\Models\PlanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlanController extends Controller
{
    public function index() 
    {
        $plans = PlanModel::orderBy('created_at', 'desc')->get();

        return response()->json($plans, 200);
    }

    public function store(Request $request) 
    {
        $request->validate([
            'id_gym' => 'required|integer',
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

    public function destroy($id)
    {
        $plan = PlanModel::find($id);

        if ($plan === null) {
            return response()->json(['mensagem' => 'Plano não encontrado.'], 404);
        }

        if ($plan->deleted_at !== null) {
            return response()->json(['mensagem' => 'Plano já deletado.'], 404);
        }

        $plan->update([
            'deleted_at' => DB::raw('now()')
        ]);

        return response()->json(['mensagem' => 'Plano excluído com sucesso'], 200);
    }
}
