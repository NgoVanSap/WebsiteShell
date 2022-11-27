<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Attribute;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'carts';

    protected $fillable = [
        'product_id_cart',
        'user_id',
        'quantity',
        'cart_id_attribute',
        'cart_price',
    ];


    public function Attributes() {

        return $this->hasMany(Attribute::class,'id');

    }


}
