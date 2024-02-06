<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillingFeesModel extends Model
{
    use HasFactory;

    protected $table = 'billing_fees';

    protected $fillable = [
        'id_gym',
        'identification',
        'flag',
        'type',
        'percentage',
        'deleted_at'
    ];
}
