@extends('website.master')
@section('content')
<div class="pages-title section-padding">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="pages-title-text text-center">
                    <h2>{{  $detailProduct['name']}}</h2>
                    <ul class="text-left">
                        <li><a href="index.html">Home </a></li>
                        <li><span> // </span><a href="shop.html">shop </a></li>
                        <li><span> // </span>{{ $detailProduct['name']}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="product-details pages section-padding-top">
    <div class="container">
        <div class="row">
            <div class="single-list-view">
                <div class="col-xs-12 col-sm-5 col-md-4">
                    <div class="quick-image">
                        <div class="single-quick-image text-center">
                            <div class="list-img">
                                <div class="product-img tab-content">
                                    <div class="simpleLens-container tab-pane fade in" id="sin-1">
                                        <div class="pro-type">
                                            <span>new</span>
                                        </div>
                                        <a class="simpleLens-image" data-lens-image="{{asset('imgProduct/' . $detailProduct['image'])  }}" href="#"><img src="{{asset('imgProduct/' .$detailProduct['image'])  }}" alt="" class="simpleLens-big-image"></a>
                                    </div>
                                    <div class="simpleLens-container tab-pane fade" id="sin-2">

                                        <a class="simpleLens-image" data-lens-image="{{asset('imgProduct/' . $detailProduct['image'])}}" href="#"><img src="{{asset('imgProduct/' . $detailProduct['image'])}}" alt="" class="simpleLens-big-image"></a>
                                    </div>
                                    <div class="simpleLens-container tab-pane fade in active" id="sin-3">
                                        @php
                                        $start = \Carbon\Carbon::parse($detailProduct['created_at']);
                                        $now = \Carbon\Carbon::now();
                                        $days_count = $start->diffInDays($now);
                                        @endphp
                                        @if ($days_count <= 15)
                                        <div class="pro-type">
                                            <span>new</span>
                                        </div>
                                        @endif
                                        @if ($detailProduct['price_sale'] > 0)
                                            <div class="pro-type sell">
                                                <span>sell</span>
                                            </div>
                                        @endif
                                        <a class="simpleLens-image" data-lens-image="{{asset('imgProduct/' . $detailProduct['image'])}}" href="#"><img src="{{asset('imgProduct/' . $detailProduct['image'])}}" alt="" class="simpleLens-big-image"><div class="simpleLens-mouse-cursor"></div></a>
                                    </div>
                                    <div class="simpleLens-container tab-pane fade in" id="sin-4">
                                        <div class="pro-type">
                                            <span>new</span>
                                        </div>
                                        <a class="simpleLens-image" data-lens-image="{{asset('imgProduct/' . $detailProduct['image'])}}" href="#"><img src="{{asset('imgProduct/' . $detailProduct['image'])}}" alt="" class="simpleLens-big-image"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="{{ route('addToCartProduct.website',['id' => $detailProduct['id']]) }}" method="post" id="addproduct{{ $detailProduct['id'] }}">

                    <div class="col-xs-12 col-sm-7 col-md-8">
                        <div class="quick-right">
                            <div class="list-text">
                                <h3>{{ $detailProduct['name'] }}</h3>
                                <span>Summer men’s fashion</span>
                                <div class="ratting floatright">
                                    <p>( {{ $detailProductUserComment->count() }} Comments )</p>
                                </div>
                                <h5>
                                    @if ($detailProduct['price_sale'] > 0)
                                        <del>${{ number_format($detailProduct['price'],2) }}</del>
                                        ${{ number_format($detailProduct['price_sale'],2) }}
                                    @else
                                        ${{ number_format($detailProduct['price'],2) }}
                                    @endif

                                </h5>
                                <p>{{ $detailProduct['infomation'] }}</p>
                                <div class="all-choose">
                                    <div class="s-shoose" style=" display: flex; align-items: center; ">
                                        <h5>size</h5>
                                        <div class="size-drop">
                                            <div class="btn-group">
                                                <div class="select-wrap">
                                                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                                    <select name="cart_id_attribute" data-id="{{ $detailProduct['id'] }}" id="myselect3_{{ $detailProduct['id'] }}" class="form-control target">
                                                        @foreach ($detailProduct->attribute as $productDetailModalSize)
                                                        <option value="{{ $productDetailModalSize->id }}">{{ $productDetailModalSize->size }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="s-shoose" style=" display: flex; align-items: center; ">
                                        <h5>qty</h5>
                                        <form action="#" method="POST">
                                            <div class="plus-minus">
                                                <a class="dec qtybutton">-</a>
                                                <input type="text" value="1" min="1" max="100" id="quantity3_{{ $detailProduct['id'] }}" name="quantity" class="plus-minus-box">
                                                <a class="inc qtybutton">+</a>
                                            </div>
                                            <div style="margin-left: 20px" class="icon pushQuantity_{{ $detailProduct['id'] }}"><span class="ion-ios-arrow-down">( Number of products left {{ $detailProduct->attribute[0]->amount }} )</span></div>
                                        </form>
                                    </div>
                                </div>
                                <div class="list-btn">
                                    <input type="hidden" value="{{ Auth::guard('customer')->id() }}" name="user_id">
                                    <input type="hidden" value="{{ $detailProduct['id'] }}" name="product_id_cart">
                                    <input type="hidden" value="{{ $detailProduct['price_sale'] > 0 ? $detailProduct['price_sale'] : $detailProduct['price'] }}" name="cart_price">
                                    <a class="addCart-3"data-id="{{ $detailProduct['id'] }}">add to cart</a>
                                    <a style="cursor: pointer" class="addWishList" data-id="{{ $detailProduct['id'] }}" data-user-id="{{ Auth::guard('customer')->id() }}">wishlist</a>
                                    <a href="#" data-toggle="modal" data-target="#quick-view_{{  $detailProduct['slug_name'] }}">zoom</a>
                                </div>
                                <div class="share-tag clearfix">
                                    <ul class="blog-share floatleft">
                                        <li><h5>share </h5></li>
                                        <li><a href="#"><i class="mdi mdi-facebook"></i></a></li>
                                        <li><a href="#"><i class="mdi mdi-twitter"></i></a></li>
                                        <li><a href="#"><i class="mdi mdi-linkedin"></i></a></li>
                                        <li><a href="#"><i class="mdi mdi-vimeo"></i></a></li>
                                        <li><a href="#"><i class="mdi mdi-dribbble"></i></a></li>
                                        <li><a href="#"><i class="mdi mdi-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- single-product item end -->
        <!-- reviews area start -->
        <div class="row">
            <div class="col-xs-12">
                <div class="reviews padding60 margin-top">
                    <ul class="reviews-tab clearfix">
                        <li class="active"><a data-toggle="tab" href="#reviews" aria-expanded="true">Reviews</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="info-reviews review-text tab-pane fade active in" id="reviews">
                            <div id="commentLoadHTML">

                            </div>
                            <div class="custom-input">
                            <input type="hidden" name="ajaxLoadComment" value="{{ $detailProduct['id'] }}">
                                <form action="{{ route('postCommentUser.website',['id' => $detailProduct['id']]) }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="input-mail margin-bottom-login">

                                                <input type="text" name="comment_user_name"
                                                @if (Auth::guard('customer')->check())
                                                    value="{{Auth::guard('customer')->user()->usernameCus}}"
                                                @endif
                                                style=" margin-bottom: 0 !important; " placeholder="Your Name" >
                                                    <p class="text-danger error-text comment_user_name_error"></p>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="input-mail margin-bottom-login">
                                                <input type="text" name="comment_user_email"
                                                @if (Auth::guard('customer')->check())
                                                    value="{{Auth::guard('customer')->user()->emailCus}}"
                                                @endif
                                                 style=" margin-bottom: 0 !important; " placeholder="Your Email">
                                                    <p class="text-danger error-text comment_user_email_error"></p>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="custom-mess margin-bottom-login">
                                                <textarea name="comment_information" style=" margin-bottom: 0 !important; " id="comment_information" placeholder="Your Review" rows="2"></textarea>
                                                <p class="text-danger error-text comment_information_error"></p>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="submit-text">
                                                <button id="submit-ReviewProduct" data-id="{{ $detailProduct['id'] }}">submit review</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- reviews area end -->
    </div>
</div>

<section class="single-products section-padding">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section-title text-center">
                    <h2>related Products</h2>
                </div>
            </div>
        </div>
        <div class="row text-center">
            @foreach ($relatedProduct as $relatedProducts )
            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="single-product">
                    <div class="product-img">
                        @php
                                $start = \Carbon\Carbon::parse($relatedProducts->created_at);
                                $now = \Carbon\Carbon::now();
                                $days_count = $start->diffInDays($now);
                        @endphp
                        @if ($days_count <= 15)
                        <div class="pro-type">
                            <span>new</span>
                        </div>
                        @endif
                        @if ($relatedProducts->price_sale > 0)
                        <div class="pro-type sell">
                            <span>sell</span>
                        </div>
                        @endif
                        <a href="{{ route('product.slug.index',['slug' => $relatedProducts->slug_name]) }}"><img src="{{ asset('imgProduct/' .$relatedProducts->image) }}" alt="Product Title"></a>
                        <div class="actions-btn">
                            <input type="hidden" value="{{ $relatedProducts->id }}" name="product_id_cart">
                            <input type="hidden" value="1" name="quantity">
                            <input type="hidden" value="{{ $relatedProducts->price_sale > 0 ? $relatedProducts->price_sale : $relatedProducts->price }}" name="cart_price">
                            <input type="hidden" value="{{ $relatedProducts->attribute[0]->id }}" name="cart_id_attribute">
                            <input type="hidden" value="{{ Auth::guard('customer')->id() }}" name="user_id">
                            <a class="addCart" data-id="{{ $relatedProducts->id }}"><i  class="mdi mdi-cart"></i></a>
                            <a href="#" data-toggle="modal" data-target="#quick-view_{{ $relatedProducts->slug_name }}"><i class="mdi mdi-eye"></i></a>

                            <a style="cursor: pointer" class="addWishList" data-id="{{ $relatedProducts->id }}" data-user-id="{{ Auth::guard('customer')->id() }}"><i class="mdi mdi-heart"></i></a>
                        </div>
                    </div>
                    <div class="product-dsc">
                        <p><a href="{{ route('product.slug.index',['slug' => $relatedProducts->slug_name]) }}">{{$relatedProducts->name}}</a></p>
                        @if ($relatedProducts->price_sale > 0)
                            <span>${{ $relatedProducts->price_sale }}
                            <del>${{ number_format($relatedProducts->price,2) }}</del>
                        </span>
                        @else
                            <span>${{ number_format($relatedProducts->price ,2)}}</span>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<div class="product-details quick-view modal animated zoomInUp" id="quick-view_{{  $detailProduct['slug_name'] }}">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="d-table">
                    <div class="d-tablecell">
                        <div class="modal-dialog">
                            <div class="main-view modal-content">
                                <div class="modal-footer" data-dismiss="modal">
                                    <span>x</span>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-5 col-md-4">
                                        <div class="quick-image">
                                            <div class="single-quick-image text-center">
                                                <div class="list-img">
                                                    <div class="product-img tab-content">
                                                        <div class="simpleLens-container tab-pane fade in active" id="sin-3">
                                                            @if ($detailProduct['price_sale'] > 0)
                                                                <div class="pro-type sell">
                                                                    <span>sell</span>
                                                                </div>
                                                            @endif
                                                            <a class="simpleLens-image" data-lens-image="{{asset('imgProduct/' . $detailProduct['image'])}}" href="#"><img src="{{asset('imgProduct/' . $detailProduct['image'])}}" alt="" class="simpleLens-big-image"><div class="simpleLens-mouse-cursor"></div></a>
                                                        </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-7 col-md-8">
                                        <div class="quick-right">
                                            <div class="list-text">
                                                <h3>{{ $detailProduct->name }}</h3>
                                                <span>Summer men’s fashion</span>
                                                <div class="ratting floatright">
                                                    <p>( {{ $detailProductUserComment->count() }} Comments )</p>
                                                </div>
                                                <h5>
                                                    @if ($detailProduct['price_sale'] > 0)
                                                        <del>${{ number_format($detailProduct['price'],2) }}</del>
                                                        ${{ number_format($detailProduct['price_sale'],2) }}
                                                    @else
                                                        ${{ number_format($detailProduct['price'],2) }}
                                                    @endif
                                            </h5>
                                                <p>{{ $detailProduct['infomation'] }}</p>
                                                <div class="all-choose">
                                                    <div class="s-shoose ">
                                                        <h5>size</h5>
                                                        <div class="size-drop">
                                                            <div class="btn-group">
                                                                <div class="select-wrap">
                                                                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                                                    <select name="cart_id_attribute" data-id="{{ $detailProduct['id'] }}" id="myselect2_{{ $detailProduct['id'] }}" class="form-control target">
                                                                        @foreach ($detailProduct->attribute as $productDetailModalSize)
                                                                        <option value="{{ $productDetailModalSize->id }}">{{ $productDetailModalSize->size }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="s-shoose " style=" display: flex; align-items: center; ">
                                                        <h5>qty</h5>
                                                            <div class="plus-minus">
                                                                <a class="dec qtybutton">-</a>
                                                                <input type="text" value="1" min="1" max="100" id="quantity2_{{ $detailProduct['id'] }}" name="quantity" class="plus-minus-box">
                                                                <a class="inc qtybutton">+</a>
                                                            </div>
                                                            <div style="margin-left: 20px" class="icon pushQuantity_{{ $detailProduct['id'] }}"><span class="ion-ios-arrow-down">( Number of products left {{ $detailProduct->attribute[0]->amount }} )</span></div>

                                                    </div>
                                                </div>
                                                <div class="list-btn">
                                                    <input type="hidden" value="{{ Auth::guard('customer')->id() }}" name="user_id">
                                                    <input type="hidden" value="{{ $detailProduct['price_sale'] > 0 ? $detailProduct['price_sale'] : $detailProduct['price'] }}" name="cart_price">
                                                    <input type="hidden" value="{{ $detailProduct['id'] }}" name="product_id_cart">
                                                    <input type="hidden" value="{{ $detailProduct['price_sale'] > 0 ? $detailProduct['price_sale'] : $detailProduct['price'] }}" name="price_cart_product">
                                                    <a class="addCart-2"data-id="{{ $detailProduct['id'] }}">add to cart</a>
                                                    <a style="cursor: pointer" class="addWishList" data-id="{{ $detailProduct['id'] }}" data-user-id="{{ Auth::guard('customer')->id() }}">wishlist</a>
                                                </div>
                                                <div class="share-tag clearfix">
                                                    <ul class="blog-share floatleft">
                                                        <li><h5>share </h5></li>
                                                        <li><a href="#"><i class="mdi mdi-facebook"></i></a></li>
                                                        <li><a href="#"><i class="mdi mdi-twitter"></i></a></li>
                                                        <li><a href="#"><i class="mdi mdi-linkedin"></i></a></li>
                                                        <li><a href="#"><i class="mdi mdi-vimeo"></i></a></li>
                                                        <li><a href="#"><i class="mdi mdi-dribbble"></i></a></li>
                                                        <li><a href="#"><i class="mdi mdi-instagram"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@foreach ( $relatedProduct as  $relatedProducts)
<div class="product-details quick-view modal animated zoomInUp" id="quick-view_{{  $relatedProducts->slug_name }}">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="d-table">
                    <div class="d-tablecell">
                        <div class="modal-dialog">
                            <div class="main-view modal-content">
                                <div class="modal-footer" data-dismiss="modal">
                                    <span>x</span>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-5 col-md-4">
                                        <div class="quick-image">
                                            <div class="single-quick-image text-center">
                                                <div class="list-img">
                                                    <div class="product-img tab-content">
                                                        <div class="simpleLens-container tab-pane active fade in" id="sin-2">
                                                            @if ($relatedProducts->price_sale > 0)
                                                            <div class="pro-type sell">
                                                                <span>sell</span>
                                                            </div>
                                                            @endif
                                                            <a class="simpleLens-image" data-lens-image="{{ asset('imgProduct/' . $relatedProducts->image ) }}" href="#"><img src="{{ asset('imgProduct/' . $relatedProducts->image ) }}" alt="" class="simpleLens-big-image"></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <form action="{{ route('addToCartProduct.website',['id' => $relatedProducts->id]) }}" method="post" id="addproduct{{ $relatedProducts->id }}">
                                        @csrf
                                        <div class="col-xs-12 col-sm-7 col-md-8">
                                            <div class="quick-right">
                                                <div class="list-text">
                                                    <h3>{{ $relatedProducts->name }}</h3>
                                                    <span>Summer men’s fashion</span>
                                                    <div class="ratting floatright">
                                                        <p>( {{ $relatedProducts->comments->count() }} Comments  )</p>

                                                    </div>
                                                    <h5>
                                                        @if ($relatedProducts->price_sale > 0)
                                                            <del>${{ number_format($relatedProducts->price,2) }}</del> ${{ number_format($relatedProducts->price_sale ,2)}}
                                                        @else
                                                            <del></del> ${{ number_format($relatedProducts->price,2) }}
                                                        @endif
                                                    </h5>
                                                    <p>{{ $relatedProducts->infomation }}</p>
                                                    <div class="all-choose">
                                                        <div class="s-shoose" style=" display: flex; align-items: center; ">
                                                            <h5>size</h5>
                                                            <div class="size-drop">
                                                                <div class="btn-group">
                                                                    <div class="select-wrap">
                                                                        <select name="cart_id_attribute"  data-id="{{ $relatedProducts->id }}" id="myselect1_{{ $relatedProducts->id }}" class="form-control target">
                                                                            @foreach ($relatedProducts->attribute as $productDetailModalSize)
                                                                            <option  value="{{ $productDetailModalSize->id }}">{{ $productDetailModalSize->size }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="s-shoose" style=" display: flex; align-items: center; ">
                                                            <h5>qty</h5>
                                                                <div class="plus-minus">
                                                                    <a class="dec qtybutton">-</a>
                                                                    <input type="text" value="1" name="quantity" id="quantity1_{{ $relatedProducts->id }}" class="plus-minus-box">
                                                                    <a class="inc qtybutton">+</a>
                                                                </div>
                                                                <div style="margin-left: 20px" class="icon pushQuantity_{{ $relatedProducts->id }}"><span class="ion-ios-arrow-down">( Number of products left {{ $relatedProducts->attribute[0]->amount }} )</span></div>

                                                        </div>
                                                    </div>
                                                    <div class="list-btn">
                                                    <input type="hidden" value="{{ $relatedProducts->price_sale > 0 ?  $relatedProducts->price_sale : $relatedProducts->price }}" name="cart_price">
                                                    <input type="hidden" value="{{ Auth::guard('customer')->id() }}" name="user_id">
                                                    <input type="hidden" value="{{ $relatedProducts->id }}" name="product_id_cart">
                                                    <input type="hidden" value="{{ $relatedProducts->price_sale > 0 ? $relatedProducts->price_sale : $relatedProducts->price }}" name="price_cart_product">
                                                    <a class="addCart-2" data-id="{{ $relatedProducts->id }}">add to cart</a>
                                                    <a style="cursor: pointer" class="addWishList" data-id="{{ $relatedProducts->id }}" data-user-id="{{ Auth::guard('customer')->id() }}">wishlist</a>
                                                    </div>
                                                    <div class="share-tag clearfix">
                                                        <ul class="blog-share floatleft">
                                                            <li><h5>share </h5></li>
                                                            <li><a href="#"><i class="mdi mdi-facebook"></i></a></li>
                                                            <li><a href="#"><i class="mdi mdi-twitter"></i></a></li>
                                                            <li><a href="#"><i class="mdi mdi-linkedin"></i></a></li>
                                                            <li><a href="#"><i class="mdi mdi-vimeo"></i></a></li>
                                                            <li><a href="#"><i class="mdi mdi-dribbble"></i></a></li>
                                                            <li><a href="#"><i class="mdi mdi-instagram"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection
