<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanModel extends Model
{
    use HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'description',
        'days',
        'price',
        'deleted_at'
    ];
}
