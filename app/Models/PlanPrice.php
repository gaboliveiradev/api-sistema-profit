<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanPrice extends Model
{
    use HasFactory;

    protected $table = 'plans_prices';

    protected $fillable = [
        'id_plan',
        'period',
        'price',
        'deleted_at'
    ];
}
