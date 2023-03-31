<?php

namespace App\Http\Controllers\websiteAll;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use DB;


class SearchController extends Controller
{
    public function searchAjaxProduct(Request $request) {

        // if($request->ajax()) {
        //     $nameProduct = $_GET['searchProduct'];
        //     $product = DB::table('products')->where('name','LIKE','%'. $nameProduct."%")
        //     ->orWhere('price','LIKE','%'. $nameProduct.'%')
        //     ->orderBy('id')->get();

        //     if(!empty($product)) {

        //         return response()->json(['status' => 0,'product' =>  $product]);

        //     } else {

        //         return response()->json(['status' => 1]);

        //     }

        // } else {
        //     $nameProduct = $_GET['searchProduct'];
        //     $product = Product::with('comments')
        //     ->with('attribute')->where('name','LIKE','%'. $nameProduct."%")
        //     ->orWhere('price','LIKE','%'. $nameProduct.'%')
        //     ->orderBy('id')->paginate(6);


        //     return view('website.viewSearch.viewSearchProduct',[
        //         'product' => $product,
        //     ]);
        // }



        if ($request->ajax()) {
            $nameProduct = $_GET['searchProduct'];
            $product = DB::table('products')
                ->where('name', 'LIKE', '%' . $nameProduct . '%')
                ->orWhere('price', 'LIKE', '%' . $nameProduct . '%')
                ->orderBy('id')
                ->get();
            return !empty($product)
                ? response()->json(['status' => 0, 'product' => $product])
                : response()->json(['status' => 1]);
        }
        $nameProduct = $_GET['searchProduct'];
        $product = Product::with('comments')
            ->with('attribute')
            ->where('name', 'LIKE', '%' . $nameProduct . '%')
            ->orWhere('price', 'LIKE', '%' . $nameProduct . '%')
            ->orderBy('id')
            ->paginate(6);
        return view('website.viewSearch.viewSearchProduct', ['product' => $product]);
    }
}
