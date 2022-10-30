<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;


class DanhMuc extends Model
{
    use HasFactory;

    protected $table = 'danh_mucs';

    protected $fillable = [
        'namecategory'
    ];


    public function product() {

        return $this->hasMany(Product::class,'product_type_id','id');

    }

}
