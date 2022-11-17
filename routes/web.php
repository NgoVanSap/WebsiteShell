<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\OderItemCheckoutController;
use App\Http\Controllers\ViewUserComment;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\websiteAll\WebsiteController;
use App\Http\Controllers\websiteAll\WebsiteDetailProductController;
use App\Http\Controllers\websiteAll\CategoryController;
use App\Http\Controllers\websiteAll\CartController;
use App\Http\Controllers\websiteAll\WishlistController;
use App\Http\Controllers\websiteAll\UserCommentProductController;
use App\Http\Controllers\websiteAll\MyAccountController;
use App\Http\Controllers\websiteAll\BillCartController;
use App\Http\Controllers\websiteAll\CustomerController;
use App\Http\Controllers\websiteAll\SearchController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//ADMIN
Route::middleware('admin')->group(function (){

    Route::prefix('admin')->group(function () {

        Route::prefix('home')->group(function () {

            Route::get('/', [AdminController::class, 'homeAdmin'])->name('home.admin');

            Route::middleware('registerMember')->group(function () {
                Route::get('/More-members', [AdminController::class, 'viewMoremembers'])->name('home.admin.Moremembers');
                Route::post('/More-members', [AdminController::class, 'postMoremember'])->name('home.admin.Moremembers');

                Route::middleware('deleteMember','editMember')->group(function () {

                    Route::get('/More-members/delete/{id}', [AdminController::class, 'deleteMoremembers'])->name('home.admin.deleteMember');
                    Route::get('/More-members/edit/{id}', [AdminController::class, 'editMoremembers'])->name('home.admin.editMember');
                    Route::get('/More-members/edit-detail/{id}', [AdminController::class, 'editDetailMoremembers'])->name('home.admin.editDetailMember');
                    Route::post('/More-members/update', [AdminController::class, 'updateMoremembers'])->name('home.admin.updateMember');

                });

            });

            Route::group(['prefix' => 'danh-muc'], function () {
                Route::get('/', [DanhMucController::class, 'index'])->name('category.admin');
                Route::post('/', [DanhMucController::class, 'create'])->name('category.admin.post');


                Route::post('Ajax', [DanhMucController::class, 'createPostAjax']);
                Route::get('get-data-ajax', [DanhMucController::class, 'showData']);
                Route::get('deleteAjax/{id}', [DanhMucController::class, 'destroyAjax']);
                Route::get('editAjax/{id}', [DanhMucController::class, 'editAjax']);
                Route::post('update', [DanhMucController::class, 'update']);
            });

            Route::middleware('deleteOrderBill')->group(function (){

                Route::get('/viewOrder/delete/{id}', [OderItemCheckoutController::class, 'deleteOrderItemCheckoutDetails'])->name('deleteOrderItemCheckout.details.admin');
                Route::delete('/viewOrder/delete/All/' , [OderItemCheckoutController::class, 'deleteOrderItemCheckoutAll'])->name('deleteOrderItemCheckoutAll.website');


            });
            Route::get('/viewUserComment' , [ViewUserComment::class, 'viewUserComment'])->name('viewUserComment.website');
            Route::get('/viewUserComment/detail/{idUser}' , [ViewUserComment::class, 'viewUserCommentDetail'])->name('viewUserCommentDetail.website');
            Route::get('/viewUserComment/delete/{id}/{idUser}' , [ViewUserComment::class, 'viewUserCommentDetailDelete'])->name('viewUserCommentDetailDelete.admin');
            Route::get('/viewUserComment/detail/comment/{id}/{idUser}' , [ViewUserComment::class, 'userCommentDetail'])->name('userCommentDetail.admin');





            //Change Password
            Route::get('/change/password', [AdminController::class, 'changePassword'])->name('home.admin.changePassword');
            Route::post('/change/password', [AdminController::class, 'changePasswordUpdate'])->name('home.admin.changePasswordUpdate');


            Route::get('order/filter', [OderItemCheckoutController::class, 'orderFilter'])->name('orderFilter.details.admin');
            Route::get('total/month', [OderItemCheckoutController::class, 'totalMonth'])->name('totalMonth.details.admin');

            Route::get('/viewOrder', [OderItemCheckoutController::class, 'index'])->name('viewOrderItemCheckout.admin');
            Route::get('/viewOrder/details/{id}', [OderItemCheckoutController::class, 'viewOrderItemCheckoutDetails'])->name('viewOrderItemCheckout.details.admin');
            Route::post('/viewOrder/update/details/{id}', [OderItemCheckoutController::class, 'updateOrderItemCheckoutDetails'])->name('updateOrderItemCheckout.details.admin');

            Route::get('/add-attribute/{id}', [AttributeController::class, 'index'])->name('attribute.admin.add');
            Route::get('/delete-attribute/{id}', [AttributeController::class, 'deleteAttribute'])->name('attribute.admin.delete');
            Route::post('/update-attribute/{id}', [AttributeController::class, 'updateAttribute'])->name('attribute.admin.update');

            Route::match(['get', 'post'], '/insert-attribute/{id}' , [AttributeController::class, 'insertAttribute'])->name('add.attribute.admin');


            Route::get('/product', [ProductController::class, 'store'])->name('product.admin');
            Route::get('/product/search', [ProductController::class, 'search'])->name('admin.search');
            Route::get('/product/delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');
            Route::get('/product/edit/{id}', [ProductController::class, 'edit']);
            Route::post('/product/update', [ProductController::class, 'update'])->name('admin.product.update');
            Route::get('/product/edit/detail/{id}', [ProductController::class, 'detail'])->name('product.edit.detail');
            Route::post('/product', [ProductController::class, 'create'])->name('product.admin.post');


        });
    });


    // Route::fallback(function () {  return view('adminMaster.Error.404'); });

});

Route::middleware('adminLogout')->group(function () {

    Route::get('/admin/login', [AdminController::class, 'index']);
    Route::post('/admin/login', [AdminController::class, 'postLoginAdmin'])->name('admin.login');

});
Route::get('/admin/logout', [AdminController::class, 'postLogoutAdmin'])->name('admin.logout');




//WEBSITE

Route::prefix('/')->group(function () {
    Route::get('/' , [WebsiteController::class, 'index'])->name('website.index');

    Route::get('detail/{slug}' , [WebsiteDetailProductController::class, 'index'])->name('product.slug.index');
    Route::get('category/all' , [CategoryController::class, 'index'])->name('product.all.index');

    //SearchProduct
    Route::get('category/{namecategory}' , [CategoryController::class, 'categoryProduct'])->name('product.category.index');
    Route::get('search/size/{size}' , [CategoryController::class, 'searchSizeProduct'])->name('searchSizeProduct.index');
    Route::get('search/price/ascending' , [CategoryController::class, 'searchAscendingProduct'])->name('searchAscendingProduct.index');
    Route::get('search/price/highDown' , [CategoryController::class, 'searchHighDownProduct'])->name('searchHighDownProduct.index');
    Route::get('search/name/AtoZ' , [CategoryController::class, 'searchAtoZProduct'])->name('searchAtoZProduct.index');
    Route::get('search/name/ZtoA' , [CategoryController::class, 'searchZtoAProduct'])->name('searchZtoAProduct.index');
    Route::get('clearance/sale' , [CategoryController::class, 'categoryProductSale'])->name('product.category.sale.index');



    //Cart
    Route::post('/add/ToCart/{id}' , [CartController::class, 'addToCartProduct'])->name('addToCartProduct.website');
    Route::get('/view/Cart' , [CartController::class, 'viewCartProduct'])->name('viewCartProduct.website');
    Route::get('/load/Cart' , [CartController::class, 'loadCartProduct'])->name('loadCartProduct.website');
    Route::get('/load/Coupon' , [CartController::class, 'loadCouponProduct'])->name('loadCouponProduct.website');
    Route::post('/update/Cart' , [CartController::class, 'updateCartProduct'])->name('updateCartProduct.website');
    Route::post('/coupon/bill' , [CartController::class, 'couponBillProduct'])->name('couponBillProduct.website');
    Route::get('/delete/Cart/{id}' , [CartController::class, 'deleteCartProduct'])->name('deleteCartProduct.website');


    //Wishlist
    Route::get('/view/WishList' , [WishlistController::class, 'index'])->name('viewWishListProduct.website');
    Route::post('/add/wishList/{id}' , [WishlistController::class, 'createWishListProduct'])->name('createWishListProduct.website');
    Route::get('/get/view/WishList' , [WishlistController::class, 'getWishListProduct'])->name('getWishListProduct.website');
    Route::get('/delete/WishList/{id}' , [WishlistController::class, 'deleteWishListProduct'])->name('deleteWishListProduct.website');





    //Comment Users
    Route::post('/users/comment/{id}' , [UserCommentProductController::class, 'postCommentUser'])->name('postCommentUser.website');
    Route::get('/load/comment/{id}' , [UserCommentProductController::class, 'loadCommentUser'])->name('loadCommentUser.website');

    //My Account

    Route::middleware('checkMyAccount')->group(function () {

        Route::get('/view/MyAccount' , [MyAccountController::class, 'index'])->name('myAccount.website');
        Route::post('/change/MyAccount/customer' , [MyAccountController::class, 'changeMyAccount'])->name('changeMyAccount.website');
        Route::post('/change/MyAccount/Password' , [MyAccountController::class, 'changeMyAccountPassword'])->name('changeMyAccountPassword.website');


    });


    Route::middleware('checkout')->group(function (){

        Route::get('/view/checkout' , [BillCartController::class, 'index'])->name('viewBillCartProduct.website');
        Route::post('/post/billCart' , [BillCartController::class, 'postBillCartProduct'])->name('postBillCartProduct.website');
        Route::get('/delete/billCart/user/{id}' , [BillCartController::class, 'deleteBillCartProduct'])->name('deleteBillCartProduct.website');

    });

    Route::get('/test/mail' , [BillCartController::class, 'testMail']);






    Route::middleware('customerLogout')->group(function (){

        Route::get('login/register' , [CustomerController::class, 'viewLoginRegister'])->name('viewLoginRegister.website');

    });

    Route::post('create/register' , [CustomerController::class, 'createRegister'])->name('createRegister.website');
    Route::post('create/login' , [CustomerController::class, 'createLogin'])->name('createLogin.website');
    Route::get('customer/logout' , [CustomerController::class, 'customerLogout'])->name('customerLogout.website');

    Route::get('search/ajax' , [SearchController::class, 'searchAjaxProduct'])->name('searchAjaxProduct.website');





    // Route::fallback(function () {  return view('website.Error.404');  });

});


