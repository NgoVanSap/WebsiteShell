<?php
namespace App\Repositories;
use App\Models\Cart;
use App\Models\Attribute;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\billCart;
use App\Http\Requests\AddToCartRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;
use DB;
use Auth;
use Validator;


class CartLists  implements CartInterface

{
    public function getViewCartList()
    {
        $userId = Auth::guard('customer')->id();

        return DB::table('carts')
        ->join('products', 'carts.product_id_cart','=','products.id')
        ->join('customers','carts.user_id' ,'=','customers.id')
        ->where('user_id','=',$userId)
        ->select('carts.*','products.name','products.image','products.price','products.price_sale','products.id as product_id_cart','products.slug_name','customers.id as user_id',)
        ->orderBy('id','desc')
        ->get();

        
    }
}

