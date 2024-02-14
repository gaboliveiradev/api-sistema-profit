<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillingModel extends Model
{
    use HasFactory;

    protected $table = 'billings';

    protected $fillable = [
        'id_gym',
        'id_user',
        'id_plan',
        'billing_date',
        'payment_date',
        'payment_method',
        'amount_paid',
        'amount_received',
        'deleted_at'
    ];
}
