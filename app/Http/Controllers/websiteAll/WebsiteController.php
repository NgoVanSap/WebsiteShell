<?php

namespace App\Http\Controllers\websiteAll;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Attribute;



class WebsiteController extends Controller
{
    public function index(Request $request) {
        $productFeatured = Product::where('is_open','=',1)->orderBy('id', 'desc')->skip(4)->take(4)->get();
        $productFeatured2 = Product::where('is_open','=',1)->orderBy('id', 'desc')->offset(4)->limit(4)->get();
        // $products = Product::with('attribute')->whereHas('attribute', function ($query) {
        //     $query->wherehas('product_id');
        // })
        // ->get();

        // dd($products);


        // $products = Product::where('is_open','=',1)->Where('price_sale','<=',0)->orderBy('id', 'desc')->get();

        // foreach ($products as $product) {
        //     $start = \Carbon\Carbon::parse($product->created_at);
        //     $now = \Carbon\Carbon::now();
        //     $days_count = $start->diffInDays($now);


        //     if($days_count <= 15){
        //         dd($product->name);
        //     } else {
        //         dd("cc");
        //     }
        // }

        $dataNew = Product::where('is_open','=',1)->Where('price_sale','<=',0)->orderBy('id', 'desc')->take(5)->get();
        $dataSale = Product::where('is_open','=',1)->Where('price_sale','>',0)->take(4)->get();
        $productFirst01 = Product::where('id', '=',21)->first();
        $productFirst02 = Product::where('id', '=',22)->first();


        // $productFirst02 = Product::whereDate('created_at', '>=', now() )->get();
        //Lấy ra kết quả của ngày hôm nay



        return view('website.layoutWebsite.mainInterface', [

            'dataSale' => $dataSale,
            'productFeatured'           => $productFeatured,
            'productFeatured2'          => $productFeatured2,
            'productFirst01'            => $productFirst01,
            'productFirst02'            => $productFirst02,
            'dataNew'                   => $dataNew,

        ]);
    }
}
