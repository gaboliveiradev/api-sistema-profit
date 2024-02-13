<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddressModel extends Model
{
    use HasFactory;

    protected $table = 'address';

    protected $fillable = [
        'id_user',
        'zip_code',
        'street',
        'district',
        'number',
        'city',
        'state',
        'complement',
        'deleted_at',
    ];
}
