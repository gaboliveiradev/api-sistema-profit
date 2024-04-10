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
    public function index($idBussinessPartners) 
    {
        $plans = Plan::whereNull('deleted_at')
        ->select('id', 'name')
        ->where('id_business_partner', '=', $idBussinessPartners)
        ->get();

        foreach ($plans as $plan) {
            $modalities = PlanModality::whereNull('deleted_at')
            ->select('id_modality', 'period', 'days')
            ->where('id_plan', '=', $plan->id)
            ->get();

            $plan->modalities = $modalities;

            $services = PlanService::whereNull('deleted_at')
            ->select('id_service')
            ->where('id_plan', '=', $plan->id)
            ->get();

            $plan->services = $services;

            $prices = PlanPrice::whereNull('deleted_at')
            ->select('period', 'price')
            ->where('id_plan', '=', $plan->id)
            ->get();

            $plan->prices = $prices;
        }

        return response()->json($plans, 200);
    }

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

            $services = !empty($request->get('services')) ? $request->get('services') : [];

            foreach ($services as $service) {
                PlanService::create([
                    'id_plan' => $plan->id,
                    'id_service' => $service['id']
                ]);
            }

            $modalities = !empty($request->get('modalities')) ? $request->get('modalities') : [];

            foreach ($modalities as $modality) {
                PlanModality::create([
                    'id_plan' => $plan->id,
                    'id_modality' => $modality['id'],
                    'period' => 1,
                    'days' => $modality['days'],    
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
