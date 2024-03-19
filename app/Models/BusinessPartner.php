<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessPartner extends Model
{
    use HasFactory;

    protected $table = 'business_partners';

    protected $fillable = [
        'id_owner',
        'type',
        'document',
        'legal_name',
        'fantasy_name',
        'segment',
        'email_contact',
        'email_financial',
        'phone',
        'other_phone',
        'deleted_at'
    ];
}
