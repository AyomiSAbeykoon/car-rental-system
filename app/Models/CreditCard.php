<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CreditCard extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'card_number',
        'type',
        'csv',
        'expired_date',
        'name_on_card',
        'customer_id'
    ];
    
}
