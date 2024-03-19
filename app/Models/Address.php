<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table = 'adresses';

    protected $fillable = [
        'type',
        'id_owner',
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
