<?php

namespace Database\Seeders;

use App\Domains\Application\TypesApplicationDomain;
use App\Models\ModuleModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder implements TypesApplicationDomain
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $modulesADM = [
            [
                'name' => 'Dashboard',
                'icon' => 'MdSpaceDashboard',
                'path' => '/',
                'children' => [],
            ],
            [
                'name' => 'Alunos',
                'icon' => 'FaUserFriends',
                'path' => '/alunos',
                'children' => [],
            ],
            [
                'name' => 'Planos Academia',
                'icon' => 'FaGem',
                'path' => '/planos',
                'children' => [],
            ],
            [
                'name' => 'Fichas de Treino',
                'icon' => 'PiFilesFill',
                'path' => '/',
                'children' => [],
            ],
            [
                'name' => 'Funcionários',
                'icon' => 'RiUser2Fill',
                'path' => '/funcionarios',
                'children' => [],
            ],
            [
                'name' => 'Vitrine Virtual',
                'icon' => 'AiFillShop',
                'path' => '/',
                'children' => [],
            ],
            [
                'name' => 'Configurações',
                'icon' => 'HiOutlineAdjustments',
                'path' => null,
                'children' => [
                    [ 'name' => 'Taxas de Cobrança', 'path' => '/taxas-cobranca' ]
                ],
            ],
        ];

        foreach ($modulesADM as $module) {
            $mod = ModuleModel::create([
                'name' => $module['name'],
                'icon' => $module['icon'],
                'path' => $module['path'],
                'application' => self::TYPE_APPLICATION_ADM,
            ]);

            foreach ($module['children'] as $children) {
                ModuleModel::create([
                    'name' => $children['name'],
                    'path' => $children['path'],
                    'id_parent' => $mod->id,
                    'application' => self::TYPE_APPLICATION_ADM,
                ]);
            }
        }
    }
}
