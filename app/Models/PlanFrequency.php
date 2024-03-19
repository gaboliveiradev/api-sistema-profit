<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanFrequency extends Model
{
    use HasFactory;

    protected $table = 'plans_frequency';

    protected $fillable = [
        'id_plan',
        'period',
        'price',
        'deleted_at'
    ];
}
