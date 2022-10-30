<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
use App\Models\DanhMuc;
use App\Models\Product;
use App\Models\WishList;
use App\Models\oderItemCheckout;
use App\Models\Cart;
use App\Models\billCart;
use Illuminate\Http\Request;
use App\Models\Attribute;
use Illuminate\Support\Facades\View;
use DB;
use Illuminate\Support\Arr;
use Auth;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $totalBillCartAll = 0;
        $totalBillCartMonth = 0;
        $totalDateNow = 0;
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();
        $productDetailModal = Product::where('is_open','=',1)->get();
        $billProductUser = billCart::orderBy('id', 'desc')->get();
        $countProduct = Product::where('is_open','>',0)->count();
        $countProductSale = Product::where('is_open','>',0)->where('price_sale','>',0)->count();
        $countBillCart = billCart::count();
        $dataBillCartMonth = billCart::select('*')
        ->where('bill_status','>=',4)
        ->whereMonth('created_at', Carbon::now()->month)
        ->get();

        $dataBillCartAll = billCart::select('*')
        ->where('bill_status','>=',4)
        ->get();

        $sellingProduct = DB::table('oder_item_checkouts')
        ->where('oder_item_checkouts.oder_status','>=',4)
        ->leftJoin('products','products.id','=','oder_item_checkouts.oder_product_id')
        ->select('products.id','products.name','products.image','products.price','products.price_sale','products.slug_name','oder_item_checkouts.oder_product_id',
             DB::raw('SUM(oder_item_checkouts.oder_quantity) as totalMount'))
        ->groupBy('products.id','oder_item_checkouts.oder_product_id','products.name','products.name','products.image','products.price','products.price_sale','products.slug_name')
        ->orderBy('totalMount','desc')
        ->limit(4)
        ->get();

        $attributes = Attribute::all();
        $dateNow =  Carbon::now()->isoFormat('YYYY-MM-DD');
        $dataTotalNow = billCart::where('bill_status','>=',4)->whereDate('created_at',$dateNow)->get();

        foreach ($dataTotalNow as $dataTotalNows) {
            $totalDateNow += $dataTotalNows->amount_of_all_products;

        }

        foreach ($dataBillCartAll as $dataBillCartAlls) {
            $totalBillCartAll += $dataBillCartAlls->amount_of_all_products;
        }


        foreach($dataBillCartMonth as $dataBillCartMonths) {

            $totalBillCartMonth += $dataBillCartMonths->amount_of_all_products;

        }




        $categorys = DanhMuc::all();
        $count = $billProductUser->count();
        foreach($billProductUser as $billProductUsers ) {
            if($billProductUsers->bill_status > 1) {
                 -- $count;
            }
        }

        view()->composer('*', function($view)
        {
            if (Auth::guard('customer')->check()) {

                $authCheckId=Auth::guard('customer')->id();
                $items =   Cart::where('user_id',$authCheckId)->get();
                View::share('items',$items);
            }
        });

        View::share('countProduct',$countProduct);
        View::share('countBillCart',$countBillCart);
        View::share('totalBillCartMonth',$totalBillCartMonth);
        View::share('totalDateNow',$totalDateNow);
        View::share('dateNow',$dateNow);
        View::share('totalBillCartAll',$totalBillCartAll);
        View::share('sellingProduct',$sellingProduct);
        View::share('countProductSale',$countProductSale);
        View::share('category',$categorys);
        View::share('productDetailModalss',$productDetailModal);
        View::share('attributes',$attributes);
        View::share('countOrder',$count);


    }
}
