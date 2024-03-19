<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessPartnerUser extends Model
{
    use HasFactory;

    protected $table = 'business_partners_users';

    protected $fillable = [
        'id_business_partner',
        'id_user',
        'deleted_at'
    ];
}
