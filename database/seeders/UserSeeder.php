<?php

namespace Database\Seeders;

use App\Models\AddressModel;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $user1 = User::create([
            'first_name' => 'Gabriel',
            'last_name' => 'Oliveira',
            'email' => 'gabriel.oliveira@sistemaprofit.com.br',
            'password'=> bcrypt('123456'),
            'phone' => '14981062041',
            'id_gym' => 1,
            'profile' => 'desenvolvedor',
            'gender' => 'M',
            'cpf' => '54424309860',
            'rg' => '643637679',
            'birthday' => '2005-10-04',
        ]);

        AddressModel::create([
            'id_user' => $user1->id,
            'zip_code' => '17250396',
            'street' => 'Rua Santa Cruz',
            'district' => 'Jardim Paulista',
            'number' => '149',
            'city' => 'Bariri',
            'state' => 'SP',
            'complement' => 'Casa',
        ]);

        $user2 = User::create([
            'first_name' => 'Jonathan',
            'last_name' => 'Oliveira',
            'email' => 'jonathan.oliveira@sistemaprofit.com.br',
            'password'=> bcrypt('123456'),
            'phone' => '14981985681',
            'id_gym' => 1,
            'profile' => 'proprietário',
            'gender' => 'M',
            'cpf' => '68898387414',
            'rg' => '873881226',
            'birthday' => '1995-01-10',
        ]);

        AddressModel::create([
            'id_user' => $user2->id,
            'zip_code' => '17250101',
            'street' => 'Rua Érico Migliorini',
            'district' => 'Centro',
            'number' => '149',
            'city' => 'Bariri',
            'state' => 'SP',
            'complement' => 'Casa',
        ]);
    }
}
