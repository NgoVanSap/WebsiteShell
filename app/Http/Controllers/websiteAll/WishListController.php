<?php

namespace App\Http\Controllers\websiteAll;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WishList;
use App\Models\Product;
use Auth;
use DB;


class WishListController extends Controller
{
    public function index () {
        $userId = Auth::guard('customer')->id();

        $getWishListProduct = Product::join('wish_lists', 'wish_lists.wish_list_product_id','=','products.id')
        ->where('wish_list_user_id',$userId)
        ->select('products.*','wish_lists.wish_list_user_id','wish_lists.id as id_wish_list')
        ->orderBy('id_wish_list', 'desc')
        ->paginate(4);

        return view('website.wishLisProduct.wishProduct',[
            'getWishListProduct' => $getWishListProduct
        ]);
    }

    public function createWishListProduct(Request $request, $id) {

        $userId = Auth::guard('customer')->id();
        $addWishListProductIsset = WishList::where('wish_list_product_id',$request->wish_list_product_id)->where('wish_list_user_id',$userId)->first();

        if(Auth::guard('customer')->check()) {
            if(!empty($addWishListProductIsset)) {

                return response()->json(['status' => 0,'error' => 'The product is already in favorites']);

            } else {
                WishList::create([

                    'wish_list_product_id' => $request->wish_list_product_id,
                    'wish_list_user_id'        => $request->wish_list_user_id,

                ]);
            }

            return response()->json(['status' => 1,'success' =>'Successfully added to favorites' ]);

        } else {
            return response()->json(['status' => 2,'error' => 'Please Login to the System']);

        }
    }

    public function deleteWishListProduct($id) {


        $deleteWishListProduct = WishList::where('id', $id)->delete();


        if($deleteWishListProduct) {
            return redirect()->back();
        }


    }
}
