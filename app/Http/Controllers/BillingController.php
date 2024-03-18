<?php

namespace App\Http\Controllers;

use App\Domains\User\TypesUserDomain;
use App\Models\BillingModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BillingController extends Controller implements TypesUserDomain
{
    public function getStaticsInfoForCard() 
    {
        $billings = BillingModel::whereNull('billings.deleted_at')
        ->select(
            DB::raw('SUM(billings.amount_received) AS incomeMonthly'),
            DB::raw('ROUND(SUM(billings.amount_paid) - SUM(billings.amount_received), 2) AS interestMonthly'),
        )
        ->where('billings.payment_date', '!=', null)
        ->whereBetween('billings.billing_date', [$this->getFirstDayOfTheMonth(), $this->getLastDayOfTheMonth()])
        ->first();

        $users = User::whereNull('users.deleted_at')
        ->select(
            DB::raw('COUNT(users.id) AS quantityGymGoer'),
        )
        ->where('users.profile', '=', self::TYPE_USER_GYMGOER)
        ->first();

        return response()->json(array_merge(
            $billings->toArray(),
            $users->toArray()
        ), 200);
    }
}
