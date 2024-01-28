<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChargeModel extends Model
{
    use HasFactory;

    protected $table = 'charges';

    protected $fillable = [
        'id_gym',
        'id_user',
        'id_plan',
        'billing_date',
        'deleted_at'
    ];
}
