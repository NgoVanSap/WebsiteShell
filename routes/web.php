<?php

use Illuminate\Support\Facades\Route;

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

            Route::get('/', [\App\Http\Controllers\AdminController::class, 'homeAdmin'])->name('home.admin');

            Route::middleware('registerMember')->group(function () {
                Route::get('/More-members', [\App\Http\Controllers\AdminController::class, 'viewMoremembers'])->name('home.admin.Moremembers');
                Route::post('/More-members', [\App\Http\Controllers\AdminController::class, 'postMoremember'])->name('home.admin.Moremembers');

                Route::middleware('deleteMember','editMember')->group(function () {

                    Route::get('/More-members/delete/{id}', [\App\Http\Controllers\AdminController::class, 'deleteMoremembers'])->name('home.admin.deleteMember');
                    Route::get('/More-members/edit/{id}', [\App\Http\Controllers\AdminController::class, 'editMoremembers'])->name('home.admin.editMember');
                    Route::get('/More-members/edit-detail/{id}', [\App\Http\Controllers\AdminController::class, 'editDetailMoremembers'])->name('home.admin.editDetailMember');
                    Route::post('/More-members/update', [\App\Http\Controllers\AdminController::class, 'updateMoremembers'])->name('home.admin.updateMember');

                });

            });

            Route::group(['prefix' => 'danh-muc'], function () {
                Route::get('/', [\App\Http\Controllers\DanhMucController::class, 'index'])->name('category.admin');
                Route::post('/', [\App\Http\Controllers\DanhMucController::class, 'create'])->name('category.admin.post');


                Route::post('Ajax', [\App\Http\Controllers\DanhMucController::class, 'createPostAjax']);
                Route::get('get-data-ajax', [\App\Http\Controllers\DanhMucController::class, 'showData']);
                Route::get('deleteAjax/{id}', [\App\Http\Controllers\DanhMucController::class, 'destroyAjax']);
                Route::get('editAjax/{id}', [\App\Http\Controllers\DanhMucController::class, 'editAjax']);
                Route::post('update', [\App\Http\Controllers\DanhMucController::class, 'update']);
            });

            Route::middleware('deleteOrderBill')->group(function (){

                Route::get('/viewOrder/delete/{id}', [\App\Http\Controllers\OderItemCheckoutController::class, 'deleteOrderItemCheckoutDetails'])->name('deleteOrderItemCheckout.details.admin');
                Route::delete('/viewOrder/delete/All/' , [\App\Http\Controllers\OderItemCheckoutController::class, 'deleteOrderItemCheckoutAll'])->name('deleteOrderItemCheckoutAll.website');


            });
            Route::get('/viewUserComment' , [\App\Http\Controllers\ViewUserComment::class, 'viewUserComment'])->name('viewUserComment.website');
            Route::get('/viewUserComment/detail/{idUser}' , [\App\Http\Controllers\ViewUserComment::class, 'viewUserCommentDetail'])->name('viewUserCommentDetail.website');
            Route::get('/viewUserComment/delete/{id}/{idUser}' , [\App\Http\Controllers\ViewUserComment::class, 'viewUserCommentDetailDelete'])->name('viewUserCommentDetailDelete.admin');
            Route::get('/viewUserComment/detail/comment/{id}/{idUser}' , [\App\Http\Controllers\ViewUserComment::class, 'userCommentDetail'])->name('userCommentDetail.admin');





            //Change Password
            Route::get('/change/password', [\App\Http\Controllers\AdminController::class, 'changePassword'])->name('home.admin.changePassword');
            Route::post('/change/password', [\App\Http\Controllers\AdminController::class, 'changePasswordUpdate'])->name('home.admin.changePasswordUpdate');


            Route::get('order/filter', [\App\Http\Controllers\OderItemCheckoutController::class, 'orderFilter'])->name('orderFilter.details.admin');
            Route::get('total/month', [\App\Http\Controllers\OderItemCheckoutController::class, 'totalMonth'])->name('totalMonth.details.admin');

            Route::get('/viewOrder', [\App\Http\Controllers\OderItemCheckoutController::class, 'index'])->name('viewOrderItemCheckout.admin');
            Route::get('/viewOrder/details/{id}', [\App\Http\Controllers\OderItemCheckoutController::class, 'viewOrderItemCheckoutDetails'])->name('viewOrderItemCheckout.details.admin');
            Route::post('/viewOrder/update/details/{id}', [\App\Http\Controllers\OderItemCheckoutController::class, 'updateOrderItemCheckoutDetails'])->name('updateOrderItemCheckout.details.admin');

            Route::get('/add-attribute/{id}', [\App\Http\Controllers\AttributeController::class, 'index'])->name('attribute.admin.add');
            Route::get('/delete-attribute/{id}', [\App\Http\Controllers\AttributeController::class, 'deleteAttribute'])->name('attribute.admin.delete');
            Route::post('/update-attribute/{id}', [\App\Http\Controllers\AttributeController::class, 'updateAttribute'])->name('attribute.admin.update');

            Route::match(['get', 'post'], '/insert-attribute/{id}' , [\App\Http\Controllers\AttributeController::class, 'insertAttribute'])->name('add.attribute.admin');


            Route::get('/product', [\App\Http\Controllers\ProductController::class, 'store'])->name('product.admin');
            Route::get('/product/search', [\App\Http\Controllers\ProductController::class, 'search'])->name('admin.search');
            Route::get('/product/delete/{id}', [\App\Http\Controllers\ProductController::class, 'destroy'])->name('product.delete');
            Route::get('/product/edit/{id}', [\App\Http\Controllers\ProductController::class, 'edit']);
            Route::post('/product/update', [\App\Http\Controllers\ProductController::class, 'update'])->name('admin.product.update');
            Route::get('/product/edit/detail/{id}', [\App\Http\Controllers\ProductController::class, 'detail'])->name('product.edit.detail');
            Route::post('/product', [\App\Http\Controllers\ProductController::class, 'create'])->name('product.admin.post');


        });
    });


    // Route::fallback(function () {  return view('adminMaster.Error.404'); });

});



//WEBSITE

Route::prefix('/')->group(function () {
    Route::get('/' , [\App\Http\Controllers\websiteAll\WebsiteController::class, 'index'])->name('website.index');

    Route::get('detail/{slug}' , [\App\Http\Controllers\websiteAll\WebsiteDetailProductController::class, 'index'])->name('product.slug.index');
    Route::get('category/all' , [\App\Http\Controllers\websiteAll\CategoryController::class, 'index'])->name('product.all.index');

    //SearchProduct
    Route::get('category/{namecategory}' , [\App\Http\Controllers\websiteAll\CategoryController::class, 'categoryProduct'])->name('product.category.index');
    Route::get('search/size/{size}' , [\App\Http\Controllers\websiteAll\CategoryController::class, 'searchSizeProduct'])->name('searchSizeProduct.index');
    Route::get('search/price/ascending' , [\App\Http\Controllers\websiteAll\CategoryController::class, 'searchAscendingProduct'])->name('searchAscendingProduct.index');
    Route::get('search/price/highDown' , [\App\Http\Controllers\websiteAll\CategoryController::class, 'searchHighDownProduct'])->name('searchHighDownProduct.index');
    Route::get('search/name/AtoZ' , [\App\Http\Controllers\websiteAll\CategoryController::class, 'searchAtoZProduct'])->name('searchAtoZProduct.index');
    Route::get('search/name/ZtoA' , [\App\Http\Controllers\websiteAll\CategoryController::class, 'searchZtoAProduct'])->name('searchZtoAProduct.index');
    Route::get('clearance/sale' , [\App\Http\Controllers\websiteAll\CategoryController::class, 'categoryProductSale'])->name('product.category.sale.index');



    //Cart
    Route::post('/add/ToCart/{id}' , [\App\Http\Controllers\websiteAll\CartController::class, 'addToCartProduct'])->name('addToCartProduct.website');
    Route::get('/view/Cart' , [\App\Http\Controllers\websiteAll\CartController::class, 'viewCartProduct'])->name('viewCartProduct.website');
    Route::get('/load/Cart' , [\App\Http\Controllers\websiteAll\CartController::class, 'loadCartProduct'])->name('loadCartProduct.website');
    Route::get('/load/Coupon' , [\App\Http\Controllers\websiteAll\CartController::class, 'loadCouponProduct'])->name('loadCouponProduct.website');
    Route::post('/update/Cart' , [\App\Http\Controllers\websiteAll\CartController::class, 'updateCartProduct'])->name('updateCartProduct.website');
    Route::post('/coupon/bill' , [\App\Http\Controllers\websiteAll\CartController::class, 'couponBillProduct'])->name('couponBillProduct.website');
    Route::get('/delete/Cart/{id}' , [\App\Http\Controllers\websiteAll\CartController::class, 'deleteCartProduct'])->name('deleteCartProduct.website');


    //Wishlist
    Route::get('/view/WishList' , [\App\Http\Controllers\websiteAll\WishlistController::class, 'index'])->name('viewWishListProduct.website');
    Route::post('/add/wishList/{id}' , [\App\Http\Controllers\websiteAll\WishlistController::class, 'createWishListProduct'])->name('createWishListProduct.website');
    Route::get('/get/view/WishList' , [\App\Http\Controllers\websiteAll\WishlistController::class, 'getWishListProduct'])->name('getWishListProduct.website');
    Route::get('/delete/WishList/{id}' , [\App\Http\Controllers\websiteAll\WishlistController::class, 'deleteWishListProduct'])->name('deleteWishListProduct.website');





    //Comment Users
    Route::post('/users/comment/{id}' , [\App\Http\Controllers\websiteAll\UserCommentProductController::class, 'postCommentUser'])->name('postCommentUser.website');
    Route::get('/load/comment/{id}' , [\App\Http\Controllers\websiteAll\UserCommentProductController::class, 'loadCommentUser'])->name('loadCommentUser.website');

    //My Account

    Route::middleware('checkMyAccount')->group(function () {

        Route::get('/view/MyAccount' , [\App\Http\Controllers\websiteAll\MyAccountController::class, 'index'])->name('myAccount.website');
        Route::post('/change/MyAccount/customer' , [\App\Http\Controllers\websiteAll\MyAccountController::class, 'changeMyAccount'])->name('changeMyAccount.website');
        Route::post('/change/MyAccount/Password' , [\App\Http\Controllers\websiteAll\MyAccountController::class, 'changeMyAccountPassword'])->name('changeMyAccountPassword.website');


    });


    Route::middleware('checkout')->group(function (){

        Route::get('/view/checkout' , [\App\Http\Controllers\websiteAll\BillCartController::class, 'index'])->name('viewBillCartProduct.website');
        Route::post('/post/billCart' , [\App\Http\Controllers\websiteAll\BillCartController::class, 'postBillCartProduct'])->name('postBillCartProduct.website');
        Route::get('/delete/billCart/user/{id}' , [\App\Http\Controllers\websiteAll\BillCartController::class, 'deleteBillCartProduct'])->name('deleteBillCartProduct.website');

    });

    Route::get('/test/mail' , [\App\Http\Controllers\websiteAll\BillCartController::class, 'testMail']);






    Route::middleware('customerLogout')->group(function (){

        Route::get('login/register' , [\App\Http\Controllers\websiteAll\CustomerController::class, 'viewLoginRegister'])->name('viewLoginRegister.website');

    });

    Route::post('create/register' , [\App\Http\Controllers\websiteAll\CustomerController::class, 'createRegister'])->name('createRegister.website');
    Route::post('create/login' , [\App\Http\Controllers\websiteAll\CustomerController::class, 'createLogin'])->name('createLogin.website');
    Route::get('customer/logout' , [\App\Http\Controllers\websiteAll\CustomerController::class, 'customerLogout'])->name('customerLogout.website');

    Route::get('search/ajax' , [\App\Http\Controllers\websiteAll\SearchController::class, 'searchAjaxProduct'])->name('searchAjaxProduct.website');



    Route::middleware('adminLogout')->group(function () {

        Route::get('/admin/login', [\App\Http\Controllers\AdminController::class, 'index']);
        Route::post('/admin/login', [\App\Http\Controllers\AdminController::class, 'postLoginAdmin'])->name('admin.login');

    });
    Route::get('/admin/logout', [\App\Http\Controllers\AdminController::class, 'postLogoutAdmin'])->name('admin.logout');


    // Route::fallback(function () {  return view('website.Error.404');  });

});


