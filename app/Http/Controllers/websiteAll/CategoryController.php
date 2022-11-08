<?php

namespace App\Http\Controllers\websiteAll;

use App\Repositories\CountProduct;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\DanhMuc;
use App\Models\Attribute;
use DB;
use Illuminate\Support\Facades\Paginator;


class CategoryController extends Controller
{
    public $getAllRepositories;


    public function __construct(CountProduct $getAllRepositories) {

        $this->getAllRepositories = $getAllRepositories;

    }
    public function index () {

        $dataProduct = Product::where('is_open',1)->orderBy('id','desc')->paginate(6);
        $dataCountProduct = Product::count('id');
        $dataProductCategoryNew = Product::where('is_open',1)->orderBy('id','desc')->take(4)->get();

        return view('website.categoryProduct.productAll' , [

            'dataProduct'        => $dataProduct,
            'dataProductCategoryNew'  => $dataProductCategoryNew,
            'dataCountProduct'        => $dataCountProduct,

        ]);



    }

    public function categoryProduct(Request $request,$namecategory) {

        $dataDanhMucCategory = DanhMuc::where('namecategory', $namecategory)->first();

        if(!$dataDanhMucCategory) {
            return view('website.Error.404');
        } else {
            $dataProductCategory = Product::where('product_type_id', $dataDanhMucCategory->id)->orderBy('id', 'desc')->paginate(6);
            $dataProductCategoryCount = Product::where('product_type_id', $dataDanhMucCategory->id)->orderBy('id', 'desc')->get();
        }
        $dataProduct = DanhMuc::with('product')->orderBy('id','desc')->first();


        return view('website.categoryProduct.productCategory' , [

            'dataDanhMucCategory'   => $dataDanhMucCategory,
            'dataProductCategory'   => $dataProductCategory,
            'dataProduct'           => $dataProduct,
            'dataProductCategoryCount'  => $dataProductCategoryCount,



        ]);


    }


    public function searchSizeProduct($size) {
        $searchSizeProduct = $this->getAllRepositories->getSearchSizeProduct($size);
        $searchSizeProductCount = Product::join('product_attributes','product_attributes.product_id','products.id')
        ->select('products.*','product_attributes.size')
        ->where('size',$size)
        ->orderBy('id', 'desc')
        ->get();
        $dataCountProduct = $this->getAllRepositories->getCountProduct();


        return view('website.searchSizeProduct.index',[
            'searchSizeProduct'             => $searchSizeProduct,
            'dataCountProduct'              => $dataCountProduct,
            'searchSizeProductCount'        => $searchSizeProductCount,
        ]);


    }


    public function searchAscendingProduct () {


        $dataSearchAscendingProduct = Product::with('comments')
        ->with('attribute')
        ->select('*')
        ->addSelect(DB::raw('IF(price_sale=0, price, price_sale ) AS current_price'))
        ->orderBy('current_price')
        ->paginate(6);

        $dataCountProduct = $this->getAllRepositories->getCountProduct();




        return view('website.searchPriceName.ascendingProduct',[

            'dataSearchAscendingProduct' => $dataSearchAscendingProduct,
            'dataCountProduct'              => $dataCountProduct,


        ]);





    }

    public function searchHighDownProduct () {
        $dataSearchHighDownProduct = $this->getAllRepositories->getSearchHighDownProduct();
        $dataCountProduct = $this->getAllRepositories->getCountProduct();



       return view('website.searchPriceName.highDownProduct',[

        'dataSearchHighDownProduct' => $dataSearchHighDownProduct,
        'dataCountProduct'              => $dataCountProduct,


       ]);

    }

    public function searchAtoZProduct() {
        $dataSearchAtoZProduct = Product::with('comments')
        ->orderBy('name','asc')
        ->paginate(6);
        $dataCountProduct = $this->getAllRepositories->getCountProduct();



        return view('website.searchNameProduct.aTozNameProduct',[
            'dataSearchAtoZProduct' => $dataSearchAtoZProduct,
            'dataCountProduct'              => $dataCountProduct,

        ]);
    }

    public function searchZtoAProduct() {
        $dataSearchZtoAProduct = Product::with('comments')
        ->orderBy('name','desc')
        ->paginate(6);
        $dataCountProduct = $this->getAllRepositories->getCountProduct();



        return view('website.searchNameProduct.zToaNameProduct',[
            'dataSearchZtoAProduct' => $dataSearchZtoAProduct,
            'dataCountProduct'              => $dataCountProduct,

        ]);
    }


    public function categoryProductSale() {

        $dataProductSale = Product::where('price_sale' ,'>',0)->paginate(6);
        $dataCountProduct = $this->getAllRepositories->getCountProduct();


        return view('website.categoryProduct.productSale',[

            'dataProductSale' => $dataProductSale,
            'dataCountProduct'              => $dataCountProduct,


        ]);
    }
}
