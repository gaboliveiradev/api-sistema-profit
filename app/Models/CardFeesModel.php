<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardFeesModel extends Model
{
    use HasFactory;
    
    protected $table = 'card_fees';

    protected $fillable = [
        'id_gym',
        'flag',
        'type',
        'percentage',
        'deleted_at'
    ];
}
