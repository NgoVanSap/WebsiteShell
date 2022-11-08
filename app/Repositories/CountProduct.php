<?php

namespace App\Repositories;
use App\Models\Product;
use App\Models\Attribute;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use DB;
use Illuminate\Pagination\LengthAwarePaginator;


class CountProduct implements CountInterface {


    public function getCountProduct() {

        return Product::count('id');

    }

    public function getSearchSizeProduct($size) {

        return Product::join('product_attributes','product_attributes.product_id','products.id')
        ->select('products.*','product_attributes.size')
        ->where('size',$size)
        ->orderBy('id', 'desc')
        ->paginate(6);

    }

    public function  getSearchSizeProductCount($size): LogOptions {
        return Product::join('product_attributes','product_attributes.product_id','products.id')
        ->select('products.*','product_attributes.size')
        ->where('size',$size)
        ->orderBy('id', 'desc')
        ->get();
    }

    public function getSearchHighDownProduct(): LengthAwarePaginator {

        return Product::with('comments')
        ->with('attribute')
        ->select('*')
        ->addSelect(DB::raw('IF(price_sale=0, price, price_sale ) AS current_price'))
        ->orderBy('current_price','desc')
        ->paginate(6);
    }


}
