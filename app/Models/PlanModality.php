<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanModality extends Model
{
    use HasFactory;

    protected $table = 'plans_modality';

    protected $fillable = [
        'id_plan',
        'id_modality',
        'period',
        'days',
        'deleted_at'
    ];
}
