<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\PlanModality;
use App\Models\PlanModel;
use App\Models\PlanPrice;
use App\Models\PlanService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlanController extends Controller
{
    /*public function index() 
    {
        $plans = PlanModel::whereNull('deleted_at')->orderBy('created_at', 'desc')->get();

        return response()->json($plans, 200);
    }*/

    public function store(Request $request) 
    {
        $request->validate([
            'id_business_partners' => 'required|integer',
            'name' => 'required|string',
        ]);

        DB::beginTransaction();

        try {
            $plan = Plan::create([
                'id_business_partner' => $request->get('id_business_partners'),
                'name' => $request->get('name'),    
            ]);

            $idsServices = !empty($request->get('services')) ? $request->get('services') : [];

            foreach ($idsServices as $idService) {
                PlanService::create([
                    'id_plan' => $plan->id,
                    'id_service' => $idService
                ]);
            }

            $idsModalities = !empty($request->get('modalities')) ? $request->get('modalities') : [];

            foreach ($idsModalities as $idModality) {
                PlanModality::create([
                    'id_plan' => $plan->id,
                    'id_modality' => $idModality,
                    'period' => 1,
                    'days' => 6,    
                ]);
            }

            $prices = !empty($request->get('prices')) ? $request->get('prices') : [];

            foreach ($prices as $price) {
                PlanPrice::create([
                    'id_plan' => $plan->id,
                    'period' => $price['id'],
                    'price' => $price['value'],
                ]);
            }

        } catch (\Throwable $e) {
            DB::rollBack();

            return response()->json(['errors' => ['database' => [$e->getMessage()]]], 404);
        }

        DB::commit();

        return response()->json($plan, 201);
    }

    /*public function destroy($id)
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
    }*/
}
