<?php

namespace App\Http\Controllers\websiteAll;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Attribute;
use DB;



class WebsiteDetailProductController extends Controller
{
    public function index ($slug,$count = 4) {

        $detailProduct = Product::where('slug_name', $slug)->first();
        if (!$detailProduct) {
            return view('website.Error.404');
        } else {
            $detailProductUserComment = DB::table('user_comments')
            ->where('comment_product_id', $detailProduct->id)
            ->orderBy('id','desc')
            ->get();
            $relatedProduct = Product::where('product_type_id','=',$detailProduct->product_type_id)
            ->where('slug_name' ,'!=',$detailProduct->slug_name)
            ->orderBy('id','desc')
            ->take($count)
            ->get();
        }
        return view('website.detailProduct.index', [

            'detailProduct'                 => $detailProduct,
            'detailProductUserComment'      => $detailProductUserComment,
            'relatedProduct'                => $relatedProduct,

        ]);

    }




}
