<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cart;


class Attribute extends Model
{
    use HasFactory;

    protected $table = 'product_attributes';

    protected $fillable = [
        'product_id','size','amount'
    ];

    public function product() {

        return $this->hasMany(Product::class);

    }


    public function Cart() {

        return $this->belongsTo(Cart::class,'cart_id_attribute','id');

    }
}
