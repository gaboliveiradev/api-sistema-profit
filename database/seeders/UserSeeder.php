<?php

namespace Database\Seeders;

use App\Domains\User\TypesUserDomain;
use App\Models\AddressModel;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder implements TypesUserDomain
{
    public function run(): void
    {
        User::create([
            'first_name' => 'Gabriel',
            'last_name' => 'Oliveira',
            'email' => 'gabriel.oliveira@sistemaprofit.com.br',
            'password'=> bcrypt('123456'),
            'phone' => '14981062041',
            'id_gym' => 1,
            'profile' => self::TYPE_USER_DEVELOPER,
            'gender' => 'M',
            'cpf' => '54424309860',
            'rg' => '643637679',
            'birthday' => '2005-10-04',
            'zip_code' => '17250396',
            'street' => 'Rua Santa Cruz',
            'district' => 'Jardim Paulista',
            'number' => '149',
            'city' => 'Bariri',
            'state' => 'SP',
            'complement' => 'Casa',
        ]);

        User::create([
            'first_name' => 'Jonathan',
            'last_name' => 'Oliveira',
            'email' => 'jonathan.oliveira@sistemaprofit.com.br',
            'password'=> bcrypt('123456'),
            'phone' => '14981985681',
            'id_gym' => 1,
            'profile' => self::TYPE_USER_ADMINISTRATOR,
            'gender' => 'M',
            'cpf' => '68898387414',
            'rg' => '873881226',
            'birthday' => '1995-01-10',
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
