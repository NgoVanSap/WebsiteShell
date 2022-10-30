<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class billCart extends Model
{
    use HasFactory;

    protected $table = 'bill_carts';

    protected $fillable = [

        'bill_user_id',
        'bill_name',
        'bill_phone',
        'bill_email',
        'bill_address',
        'bill_note',
        'bill_payment',
        'bill_total',
        'amount_of_all_products',
        'bill_status',

    ];


}
