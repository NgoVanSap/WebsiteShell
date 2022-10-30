@extends('website.master')
@section('content')
    <div class="pages-title section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="pages-title-text text-center">
                        <h2>Checkout</h2>
                        <ul class="text-left">
                            <li><a href="index.html">Home </a></li>
                            <li><span> // </span>Checkout</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="pages checkout section-padding">
        <div class="container">
            <form action="{{ route('postBillCartProduct.website') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="main-input single-cart-form padding60">
                            <div class="log-title">
                                <h3><strong>Delivery information</strong></h3>
                            </div>
                            <div class="custom-input margin-boo">
                                <div class="margin-bottom-register">
                                    <input type="text" name="bill_name" value="{{ Auth::guard('customer')->user()->usernameCus }}" placeholder="Your name">
                                    <span class="text-danger error-text bill_name_error"></span>
                                </div>
                                <div class="margin-bottom-register">
                                    <input type="text" name="bill_email"value="{{ Auth::guard('customer')->user()->emailCus }}" placeholder="Email your here">
                                    <span class="text-danger error-text bill_email_error"></span>
                                </div>
                                <div class="margin-bottom-register">
                                    <input type="text" name="bill_phone"value="{{ Auth::guard('customer')->user()->phoneCus }}" placeholder="Phone here">
                                    <span class="text-danger error-text bill_phone_error"></span>
                                </div>
                                <div class="margin-bottom-register">
                                    <div class="custom-mess">
                                        <textarea rows="2" placeholder="Your address here" id="bill_address" name="bill_address"></textarea>
                                    <span class="text-danger error-text bill_address_error"></span>
                                    </div>
                                </div>
                                <div class="margin-bottom-register">
                                    <div class="custom-mess">
                                        <textarea rows="2" placeholder="Order notes here..." id="bill_note" name="bill_note"></textarea>
                                    </div>
                                </div>
                                    <input type="hidden" name="bill_user_id" value="{{  Auth::guard('customer')->id() }}">
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <div class="padding60">
                            <div class="log-title">
                                <h3><strong>Our order</strong></h3>
                            </div>
                            <div class="cart-form-text pay-details table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th style=" text-align: center;">Size</th>
                                            <td>Total</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($productViewCart as  $productViewCarts)
                                        <tr>
                                            <th>{{$productViewCarts->name  }}x{{ $productViewCarts->quantity }}</th>
                                            <td style="text-align: center;padding-right: 0 !important;">{{$productViewCarts->cart_id_attribute }}</td>

                                            @if ($productViewCarts->price_sale > 0)

                                            <td>${{ number_format($productViewCarts->price_sale,1) }}</td>

                                            @else

                                            <td>${{ number_format($productViewCarts->price,1) }}</td>

                                            @endif

                                        </tr>
                                        @endforeach
                                        <tr>
                                            <th>Shipping and Handing</th>
                                            <td></td>
                                            <td>$15.00</td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Order total</th>
                                            <td></td>
                                            <td>${{ number_format($total,1) }}</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row margin-top">
                    <div class="col-xs-12 col-sm-6">
                        <div class="padding60">
                            <div class="log-title">
                                <h3><strong>Payment method</strong></h3>
                            </div>
                            <div class="categories">
                                <div class="payment_method" >
                                    <div class="" style=" display: flex; align-items: center;">
                                        <div class="" style=" border: 1px solid #cecdcd; background: #fff; background-clip: padding-box; border-radius: 5px; color: #545454; ">
                                            <div style="padding: 20px 20px 20px 15px;display: flex;align-items: center;">
                                                <input type="radio" name="bill_payment" value ="Receive payment"  style="margin-bottom: 5px;" id="paymentMethod-368068">
                                                <label for="paymentMethod-368068" style="display: flex;margin-bottom: 0 !important;cursor: pointer;">
                                                    <span style=" margin-left: 9px;">Payment on Delivery (COD)</span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" style=" margin-left: 36px;" width="19" height="19" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z"/>
                                                        <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z"/>
                                                        <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z"/>
                                                        <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z"/>
                                                      </svg>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="text-danger error-text bill_payment_error"></span>
                                </div>
                                <div class="submit-text">
                                    <button type="submit" id="checkoutBill" class="btn-checkoutBill">PLACE ORDER</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </section>
@endsection
