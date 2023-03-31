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
        ->join('product_attributes','carts.cart_id_attribute','=','product_attributes.id')
        ->join('customers','carts.user_id' ,'=','customers.id')
        ->where('user_id','=',$userId)
        ->select('carts.*','products.name','products.image','products.price','products.price_sale','products.id as product_id_cart','products.slug_name','customers.id as user_id','product_attributes.id as cart_id_attribute','product_attributes.size as cart_attribute_size')
        ->orderBy('id','desc')
        ->get();


    }

    public function totalCheckout() {
        $userId = Auth::guard('customer')->id();

        $getDataBill =  DB::table('carts')
        ->join('products', 'carts.product_id_cart','=','products.id')
        ->join('product_attributes','carts.cart_id_attribute','=','product_attributes.id')
        ->join('customers','carts.user_id' ,'=','customers.id')
        ->where('user_id','=',$userId)
        ->select('carts.*','products.price','products.price_sale','products.id as product_id_cart','customers.id as user_id','product_attributes.size as cart_id_attribute ')
        ->get();

        $transport = 15;
        $total = 0;
        foreach ($getDataBill as $productViewCarts) {

            $total += ($productViewCarts->price_sale > 0 ? $productViewCarts->price_sale : $productViewCarts->price) * $productViewCarts->quantity;

        }
        return  $total+=$transport;
    }
}

