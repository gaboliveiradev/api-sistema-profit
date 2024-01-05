<?php

namespace Database\Seeders;

use App\Models\GymModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GymSeeder extends Seeder
{
    public function run(): void
    {
        GymModel::create([
            'legal_name' => 'Marcia S S da Oliveira Academia LTDA',
            'fantasy_name' => 'Academia Star Fitness',
            'email' => 'marcia.souto@gmail.com',
            'phone' => '14990437643',
            'cnpj' => '41707392000100',
            'logo_url' => 'https://imgur.com/S5h6KsO.png',
            'primary_color'=> '#0554d2',
            'secondary_color' => '#0554d2',
            'zip_code' => '17250166',
            'street' => 'Avenida Antonio José da Silva',
            'district' => 'Centro',
            'number' => '520',
            'city' => 'Bariri',
            'state' => 'SP',
            'complement' => 'Matriz',
        ]);
    }
}
