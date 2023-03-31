@extends('website.master')
@section('content')

<div class="pages-title section-padding">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="pages-title-text text-center">
                    <h2>Giỏ hàng</h2>
                    <ul class="text-left">
                        <li><a href="{{ route('website.index') }}">Trang chủ </a></li>
                        <li><span> // </span>Giỏ hàng</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="pages cart-page section-padding">
    <div class="container">
        @if ($cartCount <= 0)
        <div class="pages error-page section-padding">
            <div class="container text-center">
                <div class="error-content">
                      <svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16" style=" margin-bottom: 23px;">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                      </svg>
                    <h4>Giỏ của bạn đang trống.</h4>
                    <a href="{{ route('product.all.index') }}">
                        <p style="text-transform: none;text-decoration: underline;">Hãy mua sản phẩm ngay bây giờ.</p>
                    </a>
                </div>
            </div>
        </div>
        @else
        <div class="row">
            <div class="col-xs-12">
                <div class="table-responsive padding60">
                    <table class="wishlist-table text-center">
                        <thead>
                            <tr>
                                <th>Sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Tổng giá</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody id="Cartmytable">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row margin-top">
            {{-- <div class="col-sm-6">
                <div class="single-cart-form padding60">
                    <div class="log-title">
                        <h3><strong>coupon discount</strong></h3>
                    </div>
                    <div class="cart-form-text custom-input">
                        <p>Enter your coupon code if you have one!</p>
                        <form action="{{ route('couponBillProduct.website') }}" method="post">
                            @csrf
                            <input type="text" name="subject" placeholder="Enter your code here...">
                            <div class="submit-text coupon">
                                <button class="coupon_click" type="submit">apply coupon </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div> --}}
            <div class="col-sm-12">
                <div class="single-cart-form padding60">
                    <div class="log-title">
                        <h3><strong>Chi tiết thanh toán</strong></h3>
                    </div>
                    <div class="cart-form-text pay-details table-responsive" id="table-bill">

                    </div>
                    <div class="chekoutBill" style=" margin-top: 40px;">
                        <a href="{{ route('viewBillCartProduct.website') }}">
                            <button class="btn-checkoutBill" >Thanh toán</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row margin-top">
            <div class="col-xs-12">
                <div class="padding60">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="single-cart-form">
                                <div class="log-title">
                                    <h3><strong>calculate shipping</strong></h3>
                                </div>
                                <div class="cart-form-text custom-input">
                                    <p>Enter your coupon code if you have one!</p>
                                    <form action="mail.php" method="post">
                                        <input type="text" name="country" placeholder="Country">
                                        <div class="submit-text">
                                            <button type="submit">get a quote</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="single-cart-form">
                                <div class="cart-form-text post-state custom-input">
                                    <form action="mail.php" method="post">
                                        <input type="text" name="state" placeholder="Region / State">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="single-cart-form">
                                <div class="cart-form-text post-state custom-input">
                                    <form action="mail.php" method="post">
                                        <input type="text" name="subject" placeholder="Post Code">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

    </div>
</section>
@endsection

