<?php

namespace Database\Seeders;

use App\Models\PlanModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PlanModel::create([
            'description' => 'Plano Avançado',
            'days' => 6,
            'price' => 90,
        ]);

        PlanModel::create([
            'description' => 'Plano Iniciante',
            'days' => 3,
            'price' => 80,
        ]);
    }
}
