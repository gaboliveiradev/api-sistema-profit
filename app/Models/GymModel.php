<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GymModel extends Model
{
    use HasFactory;

    protected $table = 'gyms';

    protected $fillable = [
        'legal_name',
        'fantasy_name',
        'email',
        'phone',
        'cnpj',
        'logo_url',
        'primary_color',
        'secondary_color',
        'zip_code',
        'street',
        'district',
        'number',
        'city',
        'state',
        'complement',
        'deleted_at'
    ];
}
