<?php

namespace App\Http\Controllers\websiteAll;

use DB;
use Auth;
use Validator;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\billCart;
use App\Models\Attribute;
use Illuminate\Http\Request;
use App\Jobs\LoadCartProduct;
use App\Repositories\CartLists;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use App\Http\Requests\AddToCartRequest;
use Illuminate\Support\Facades\Session;





class CartController extends Controller
{
    public $viewCartList;

    public function __construct(CartLists $viewCartList) {

        $this->viewCartList = $viewCartList;

    }
    public function addToCartProduct(Request $request,$id) {
        $validator = Validator::make($request->all(),[

            'quantity'         => 'required|numeric',
        ],
        [

            'quantity.numeric'         => 'Quantity must equal number',

        ]);
        $userId = Auth::guard('customer')->id();
        $product  = Product::find($id);
        $data = Attribute::where('product_id',$request->car_detail)->get();
        $cartAdd = Cart::where('user_id', $request->user_id)->where('product_id_cart',$request->product_id_cart)->where('cart_id_attribute',$request->cart_id_attribute)->first();


            if(Auth::guard('customer')->check()) {

                if($validator->fails()) {

                    return response()->json(['status' => 0 ]);

                } else {

                    if(!empty($cartAdd)) {

                        $cartAdd->quantity += $request->quantity;
                        $cartAdd->save();
                        return response()->json(['status' => 1,'success' =>'Add to cart successfully' ]);
                    } else {

                        Cart::create([

                            'product_id_cart'   => $request->product_id_cart,
                            'quantity'          => $request->quantity,
                            'cart_id_attribute' => $request->cart_id_attribute,
                            'user_id'           => $request->user_id,
                            'cart_price'        => $request->cart_price,
                        ]);
                        return response()->json(['status' => 1,'success' =>'Add to cart successfully']);

                    }
                }


         } else {

             return response()->json(['status' => 2,'error' => 'Please Login to the System']);

         }

    }

    public function viewCartProduct() {
        $userId = Auth::guard('customer')->id();
        $cartCount = Cart::where('user_id','=',$userId)->count();
        $coupon = Coupon::first();

        $productViewCart = $this->viewCartList->getViewCartList();

        return view('website.viewCart.viewCart',[

            'cartCount' => $cartCount,


        ]);

    }

    public function couponBillProduct(Request $request) {
        $data = $request->input('subject');

        if(Coupon::where('coupons_bill',$data)->exists()) {

            $coupon = Coupon::where('coupons_bill',$data)->first();

            if($coupon->coupon_status == 1) {

                $productViewCart = $this->viewCartList->getViewCartList();

                $total = $this->viewCartList->totalCheckout();

                $dataSession = Session::get('total',$total);
                return response()->json([
                    'status' =>true,
                    'productViewCart' => $productViewCart,
                    'total' => $total,
                    'dataSession' => $dataSession,

                ]);
            }

        } else {
            dd('cc');
        }
    }

    public function loadCartProduct(Request $request) {

        $productViewCart = $this->viewCartList->getViewCartList();
        $total = $this->viewCartList->totalCheckout();

        return response()->json([

            'productViewCart' => $productViewCart,
            'total'           => $total,

        ]);
    }

    public function updateCartProduct(Request $request ) {

        $data = Attribute::where('product_id',$request->car_detail)->get();
        $cartAdd = Cart::where('user_id', $request->user_id)
        ->where('product_id_cart',$request->product_id_cart)
        ->where('cart_id_attribute',$request->cart_id_attribute)
        ->first();

        if(!empty($cartAdd)) {

            $cartAdd->quantity = $request->quantity;
            $cartAdd->save();
        } else {

            Cart::update([
                'cart_id_attribute' => $request->cart_id_attribute,
                'product_id_cart'=> $request->product_id_cart,
                'quantity'        => $request->new_qty,
                'user_id'    => $request->user_id,
            ]);

        }
        return response()->json(['status' => 1,'success' =>'Update cart successfully']);

    }


    public function deleteCartProduct($id) {

        $data = Cart::where('id',$id)->first();
        $userId = Auth::guard('customer')->id();

        $dataCartCount = Cart::where('user_id',$userId)->count('id');
        if(!empty($data)) {
            $data->delete();
            return response()->json([


                'status' => true,
                'dataCartCount' => $dataCartCount,

            ]);
        } else {

            return response()->json([

                'status' => false

            ]);

        }
    }


}
