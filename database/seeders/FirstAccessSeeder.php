<?php

namespace Database\Seeders;
use App\Models\Address;
use App\Domains\Address\TypesAddressDomain;
use App\Domains\BusinessPartners\SegmentsBusinessPartnerDomain;
use App\Domains\BusinessPartners\TypesBusinessPartnerDomain;
use App\Domains\User\TypesUserDomain;
use App\Models\BusinessPartner;
use App\Models\BusinessPartnerUser;
use App\Models\User;
use Illuminate\Database\Seeder;

class FirstAccessSeeder extends Seeder implements TypesAddressDomain, TypesBusinessPartnerDomain, SegmentsBusinessPartnerDomain, TypesUserDomain
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'first_name' => 'Marcia',
            'last_name' => 'Souto',
            'email' => 'marcia.souto@gmail.com',
            'password' => bcrypt('123456'),
            'phone' => '14990437643',
            'type' => self::TYPE_USER_ADMINISTRATOR,
            'gender' => 'F',
            'cpf' => '57898309743',
            'rg' => '649879891',
            'birthday' => '1989-10-09',
        ]);

        Address::create([
            'type' => self::TYPE_ADDRESS_USER,
            'id_owner' => $user->id,
            'zip_code' => '17250166',
            'street' => 'Avenida Antonio José da Silva',
            'district' => 'Centro',
            'number' => '520',
            'city' => 'Bariri',
            'state' => 'SP',
            'complement' => 'Matriz',
        ]);

        $bp = BusinessPartner::create([
            'id_owner' => $user->id,
            'type' => self::TYPE_BUSINESS_PARTNERS_COMPANY,
            'document' => '41707392000100',
            'legal_name' => 'Marcia S S da Oliveira Academia LTDA',
            'fantasy_name' => 'Academia Star Fitness',
            'segment' => self::SEGMENT_BODYBUILDING_ACADEMY,
            'email_financial' => 'marcia.souto@gmail.com',
            'phone' => '14990437643',
        ]);

        Address::create([
            'type' => self::TYPE_ADDRESS_BUSINESS_PARTNERS,
            'id_owner' => $bp->id,
            'zip_code' => '17250166',
            'street' => 'Avenida Antonio José da Silva',
            'district' => 'Centro',
            'number' => '520',
            'city' => 'Bariri',
            'state' => 'SP',
            'complement' => 'Matriz',
        ]);

        BusinessPartnerUser::create([
            'id_business_partner' => $bp->id,
            'id_user' => $user->id
        ]);
    }
}
