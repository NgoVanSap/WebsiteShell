<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class oderItemCheckout extends Model
{
    use HasFactory;
    protected $table = 'oder_item_checkouts';
    protected $fillable = [

        'oder_product_id',
        'oder_user_id',
        'oder_bill_cart_id',
        'oder_cart_id_attribute',
        'oder_quantity',
        'oder_price',
        'oder_status',

    ];

}
