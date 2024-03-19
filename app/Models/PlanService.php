<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanService extends Model
{
    use HasFactory;

    protected $table = 'plans_services';

    protected $fillable = [
        'id_plan',
        'id_service',
        'deleted_at'
    ];
}
