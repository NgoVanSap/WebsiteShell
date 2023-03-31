@extends('website.master')
@section('content')

<div class="main-slider-one slider-area">
    <div id="wrapper">
        <div class="slider-wrapper">
            <div id="mainSlider" class="nivoSlider">
                <img src="assetsWebsite1/img/slider/home1/1.jpg" alt="main slider" title="#htmlcaption"/>
                <img src="assetsWebsite1/img/slider/home1/2.jpg" alt="main slider" title="#htmlcaption2"/>
            </div>
            <div id="htmlcaption" class="nivo-html-caption slider-caption">
                <div class="container">
                    <div class="slider-left slider-right">
                        <div class="slide-text animated bounceInRight">
                            <h3 class="bounceInDown">new collection</h3>
                            <h1>Men’s Fashion 2016</h1>
                            <span>Starting at $65.00. Don’t miss out!</span>
                        </div>
                        <div class="one-p animated bounceInLeft">
                            <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum".</p>
                        </div>
                        <div class="animated slider-btn fadeInUpBig">
                            <a class="shop-btn" href="{{ route('product.all.index') }}">Shop now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="htmlcaption2" class="nivo-html-caption slider-caption">
                <div class="container">
                    <div class="slider-left slider-right">
                        <div class="slide-text animated bounceInRight">
                            <h3>new collection</h3>
                            <h1>Men’s Fashion 2016</h1>
                            <span>Starting at $65.00. Don’t miss out!</span>
                        </div>
                        <div class="one-p animated bounceInLeft">
                            <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum".</p>
                        </div>
                        <div class="animated slider-btn fadeInUpBig">
                            <a class="shop-btn" href="{{ route('product.all.index') }}">Shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="collection-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="single-colect banner collect-one">
                    <a href="#"><img src="assetsWebsite1/img/collect/1.jpg" alt="" /></a>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="colect-text ">
                    <h4><a href="#">Fashion Collection 2016</a></h4>
                    <h5>big sale of the men 2016 fashion <br /> Up To 23% Off!</h5>
                    <a href="{{ route('product.all.index') }}">Shop Now <i class="mdi mdi-arrow-right"></i></a>
                </div>
                <div class="collect-img banner margin single-colect">
                    <a href="#"><img src="assetsWebsite1/img/collect/2.jpg" alt="" /></a>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="collect-img banner single-colect">
                    <a href="#"><img src="assetsWebsite1/img/collect/3.jpg" alt="" /></a>
                    <h2>New Collection</h2>
                </div>
                <div class="colect-text ">
                    <h4><a href="#">Men’s Collection 2016</a></h4>
                    <p>There are many variations of passages of Lorem Ipsum avalabbut the majority have suffered alteration in some form.</p>
                    <a href="{{ route('product.all.index') }}">Shop Now <i class="mdi mdi-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="single-products section-padding extra-padding-bottom">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section-title text-center">
                    <h2>Featured Products</h2>
                </div>
            </div>
        </div>
        <div class="wrapper">
            <ul class="load-list load-list-one">
                <li>
                    <div class="row text-center">
                        @foreach ($productFeatured as $productFeatureds)
                        <form action="{{ route('addToCartProduct.website',['id' => $productFeatureds->id]) }}" method="post" id="addproduct{{ $productFeatureds->id }}">
                            @csrf
                            <div class="col-xs-12 col-sm-6 col-md-3" style=" margin-top: 40px;">
                                <div class="single-product">
                                    <div class="product-img">
                                        @if ($productFeatureds->price_sale > 0)
                                        <div class="pro-type sell">
                                            <span>sell</span>
                                        </div>
                                        @endif
                                        <a href="{{ route('product.slug.index',['slug' => $productFeatureds->slug_name]) }}"><img  src="{{ asset('imgProduct/' .$productFeatureds->image) }}" alt="Product Title" /></a>
                                        <div class="actions-btn">
                                            <input type="hidden" value="{{ $productFeatureds->id }}" name="product_id_cart">
                                            <input type="hidden" value="1" name="quantity">
                                            <input type="hidden" value="{{ $productFeatureds->price_sale > 0 ? $productFeatureds->price_sale : $productFeatureds->price }}" name="cart_price">
                                            <input type="hidden" value="{{ $productFeatureds->attribute[0]->id }}" name="cart_id_attribute">
                                            <input type="hidden" value="{{ Auth::guard('customer')->id() }}" name="user_id">
                                            <a class="addCart" data-id="{{ $productFeatureds->id }}"><i  class="mdi mdi-cart"></i></a>

                                            <a href="#" data-toggle="modal" data-target="#quick-view_{{ $productFeatureds->slug_name }}"><i class="mdi mdi-eye"></i></a>
                                            <a style="cursor: pointer" class="addWishList" data-id="{{ $productFeatureds->id }}" data-user-id="{{ Auth::guard('customer')->id() }}"><i class="mdi mdi-heart"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-dsc">
                                        <p><a href="{{ route('product.slug.index',['slug' => $productFeatureds->slug_name]) }}">{{ $productFeatureds->name }}</a></p>
                                        @if ($productFeatureds->price_sale > 0)
                                        <span>${{ $productFeatureds->price_sale }}
                                            <del>${{ number_format($productFeatureds->price,2) }}</del>
                                        </span>
                                        @else
                                        <span>${{ number_format($productFeatureds->price ,2)}}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </form>
                        @endforeach
                    </div>
                </li>
                <li>
                    <div class="row text-center">
                        @foreach ($productFeatured2 as $productFeatured2s)
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <div class="single-product">
                                <div class="product-img">
                                    @if ($productFeatured2s->price_sale > 0)
                                    <div class="pro-type sell">
                                        <span>sell</span>
                                    </div>
                                    @endif
                                    <a href="#"><img src="{{ asset('imgProduct/' .$productFeatured2s->image) }}" alt="Product Title" /></a>
                                    <div class="actions-btn">
                                        <a href="#"><i class="mdi mdi-cart"></i></a>
                                        <a href="#" data-toggle="modal" data-target="#quick-view_{{ $productFeatured2s->slug_name }}"><i class="mdi mdi-eye"></i></a>
                                        <a style="cursor: pointer" class="addWishList" data-id="{{ $productFeatureds->id }}" data-user-id="{{ Auth::guard('customer')->id() }}"><i class="mdi mdi-heart"></i></a>
                                    </div>
                                </div>
                                <div class="product-dsc">
                                    <p><a href="{{ route('product.slug.index',['slug' => $productFeatured2s->slug_name]) }}">{{ $productFeatured2s->name }}</a></p>
                                    @if ($productFeatured2s->price_sale > 0)
                                    <span>${{ $productFeatured2s->price_sale }}
                                        <del>${{ number_format($productFeatured2s->price,2) }}</del>
                                    </span>
                                    @else
                                    <span>${{ number_format($productFeatured2s->price ,2)}}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <!-- single product end -->
                    </div>
                </li>
            </ul>
            {{-- @if ($productFeatured2->count() >= 4)
                <button id="load-more-one">Load More</button>
            @endif --}}
        </div>
    </div>
</section>

<section class="coming-product">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-md-2">
                <div class="tab-menu nav nav-tabs padding">
                    <ul>
                        <li class="active">
                            <a href="#dress1" data-toggle="tab" data-target="#dress1, #text1">
                                <img src="assetsWebsite1/img/coming/s1.jpg" alt="" />
                            </a>
                        </li>
                        <li>
                            <a href="#dress2" data-toggle="tab" data-target="#dress2,#text2">
                                <img src="assetsWebsite1/img/coming/s2.jpg" alt="" />
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-7 col-md-5">
                <div class="text-center large-img tab-content">
                    <div class="tab-pane fade in active" id="dress1">
                        <img src="assetsWebsite1/img/coming/l1.jpg" alt="" />
                    </div>
                    <div class="tab-pane fade" id="dress2">
                        <img src="assetsWebsite1/img/coming/l2.jpg" alt="" />
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-5">
                <div class="padding">
                    <div class="tab-content" >
                        <div class="single-coming tab-pane fade in active" id="text1">
                            <h4><a>Men’s Black T-shirt</a></h4>
                            <span><strong>$100.00</strong>   <del>$120.00</del></span>
                            <p class="come-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed does eiusmodes tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim venim, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Ut enim ad minim veniam.</p>
                            <ul class="color-size">
                                <li><span>Kích thước</span><strong>:</strong> <a href="#">SL</a><a href="#">ML</a><a href="#">Xl</a></li>
                                <li><span>Nhãn Hiệu</span><strong>:</strong>Crazy Fashion</li>
                                <li><span>Danh mục</span><strong>:</strong>Fashion   Men’s</li>
                            </ul>
                            <div class="count-text clearfix">
                                <ul id="countdown-1">
                                    <li>
                                        <p class="timeRefDays timedescription">days</p>
                                        <span id="html-days" class=" days timenumbers">00</span>
                                    </li>
                                    <li>
                                        <p class="timeRefHours timedescription">hrs</p>
                                        <span id="html-hours" class="hours timenumbers">00</span>
                                    </li>
                                    <li>
                                        <p class="timeRefMinutes timedescription">mins</p>
                                        <span id="html-minutes" class="minutes timenumbers">00</span>
                                    </li>
                                    <li>
                                        <p class="timeRefSeconds timedescription">secs</p>
                                        <span id="html-seconds" class="seconds timenumbers">00</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="single-coming tab-pane fade" id="text2">
                            <h4><a>Men’s White T-shirt</a></h4>
                            <span><strong>$120.00</strong>   <del>$250.00</del></span>
                            <p class="come-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed does eiusmodes tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim venim, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Ut enim ad minim veniam.</p>
                            <ul class="color-size">
                                <li><span>Size</span><strong>:</strong> <a href="#">SL</a><a href="#">ML</a><a href="#">Xl</a></li>
                                <li><span>Brand</span><strong>:</strong>Crazy Fashion</li>
                                <li><span>category</span><strong>:</strong>Fashion   Men’s</li>
                            </ul>
                            <div class="count-text clearfix">
                                <ul id="countdown-2">
                                    <li>
                                        <p class="timeRefDays timedescription">days</p>
                                        <span id="html-days1" class="days timenumbers">00</span>
                                    </li>
                                    <li>
                                        <p class="timeRefHours timedescription">hrs</p>
                                        <span id="html-hours1" class="hours timenumbers">00</span>
                                    </li>
                                    <li>
                                        <p class="timeRefMinutes timedescription">mins</p>
                                        <span id="html-minutes1" class="minutes timenumbers">00</span>
                                    </li>
                                    <li>
                                        <p class="timeRefSeconds timedescription">secs</p>
                                        <span id="html-seconds1" class="seconds timenumbers">00</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="tab-products single-products section-padding extra-padding-top">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section-title text-center">
                    <div class="product-tab nav nav-tabs">
                        <ul>
                            <li class="active"><a data-toggle="tab" href="#arrival">Mới <span>/</span></a></li>
                            <li><a data-toggle="tab" href="#popular">nổi bật <span>/</span></a></li>
                            <li><a data-toggle="tab" href="#best">Giảm giá</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center tab-content">
            <div class="tab-pane  fade in active" id="arrival">
                <div class="wrapper">
                    <ul class="load-list load-list-two">
                        <li>
                            <div class="row text-center">
                              @foreach ($dataNew as $dataNews)
                              @php
                                    $start = \Carbon\Carbon::parse($dataNews->created_at);
                                    $now = \Carbon\Carbon::now();
                                    $days_count = $start->diffInDays($now);
                              @endphp
                                @if ($dataNews->attribute->count() >=1)
                                <form action="{{ route('addToCartProduct.website',['id' => $dataNews->id]) }}" method="post" id="addproduct{{ $dataNews->id }}">
                                    @csrf
                                <div class="col-xs-12 col-sm-6 col-md-3" style=" margin-top: 40px;">
                                    <div class="single-product">
                                    <div class="product-img">

                                        @if ($days_count <= 15)
                                        <div class="pro-type">
                                            <span>new</span>
                                        </div>
                                        @endif

                                        <a href="{{ route('product.slug.index',['slug' => $dataNews->slug_name])}}">
                                            <img src="{{ asset('imgProduct/'. $dataNews->image) }}" alt="Product Title" />
                                        </a>
                                        <div class="actions-btn">
                                            <input type="hidden" value="{{ $dataNews->id }}" name="product_id_cart">
                                            <input type="hidden" value="1" name="quantity">
                                            <input type="hidden" value="{{ $dataNews->price_sale > 0 ?  $dataNews->price_sale : $dataNews->price }}" name="cart_price">
                                            <input type="hidden" value="{{ $dataNews->attribute[0]->id }}" name="cart_id_attribute">
                                            <input type="hidden" value="{{ Auth::guard('customer')->id() }}" name="user_id">
                                            <a class="addCart" data-id="{{ $dataNews->id }}"><i  class="mdi mdi-cart"></i></a>
                                            <a href="#" data-toggle="modal" data-target="#quick-view_{{ $dataNews->slug_name }}"><i class="mdi mdi-eye"></i></a>
                                            <a style="cursor: pointer" class="addWishList" data-id="{{ $dataNews->id }}" data-user-id="{{ Auth::guard('customer')->id() }}"><i class="mdi mdi-heart"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-dsc">
                                        <p><a href="{{ route('product.slug.index',['slug' => $dataNews->slug_name])}}">{{ $dataNews->name }}</a></p>
                                        @if ($dataNews->price_sale > 0)
                                            <span>${{ $dataNews->price_sale }}
                                            <del>${{ number_format($dataNews->price,2) }}</del>
                                        </span>
                                        @else
                                            <span>${{ number_format($dataNews->price ,2)}}</span>
                                        @endif
                                    </div>
                                    </div>
                                </div>
                                </form>
                                @endif

                              @endforeach
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- arrival product end -->
            <div class="tab-pane fade" id="popular">
                <div class="wrapper">
                    <ul class="load-list load-list-three">
                        <li>
                            <div class="row text-center">
                                @foreach ($productFeatured as $productFeatureds)
                                <form action="{{ route('addToCartProduct.website',['id' => $productFeatureds->id]) }}" method="post" id="addproduct{{ $productFeatureds->id }}">
                                    @csrf
                                    <div class="col-xs-12 col-sm-6 col-md-3" style=" margin-top: 40px;">
                                        <div class="single-product">
                                            <div class="product-img">
                                                @if ($productFeatureds->price_sale > 0)
                                                <div class="pro-type sell">
                                                    <span>sell</span>
                                                </div>
                                                @endif
                                                <a href="{{ route('product.slug.index',['slug' => $productFeatureds->slug_name]) }}"><img  src="{{ asset('imgProduct/' .$productFeatureds->image) }}" alt="Product Title" /></a>
                                                <div class="actions-btn">
                                                    <input type="hidden" value="{{ $productFeatureds->id }}" name="product_id_cart">
                                                    <input type="hidden" value="1" name="quantity">
                                                    <input type="hidden" value="{{ $productFeatureds->attribute[0]->id }}" name="cart_id_attribute">
                                                    <input type="hidden" value="{{ $productFeatureds->price_sale > 0 ? $productFeatureds->price_sale : $productFeatureds->price }}" name="cart_price">
                                                    <input type="hidden" value="{{ Auth::guard('customer')->id() }}" name="user_id">
                                                    <a class="addCart" data-id="{{ $productFeatureds->id }}"><i  class="mdi mdi-cart"></i></a>

                                                    <a href="#" data-toggle="modal" data-target="#quick-view_{{ $productFeatureds->slug_name }}"><i class="mdi mdi-eye"></i></a>
                                                    <a style="cursor: pointer" class="addWishList" data-id="{{ $productFeatureds->id }}" data-user-id="{{ Auth::guard('customer')->id() }}"><i class="mdi mdi-heart"></i></a>
                                                </div>
                                            </div>
                                            <div class="product-dsc">
                                                <p><a href="{{ route('product.slug.index',['slug' => $productFeatureds->slug_name]) }}">{{ $productFeatureds->name }}</a></p>
                                                @if ($productFeatureds->price_sale > 0)
                                                <span>${{ $productFeatureds->price_sale }}
                                                    <del>${{ number_format($productFeatureds->price,2) }}</del>
                                                </span>
                                                @else
                                                <span>${{ number_format($productFeatureds->price ,2)}}</span>
                                                @endif
                                            </div>
                                        </div>



                                    </div>
                                </form>
                                @endforeach
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- popular product end -->
            <div class="tab-pane fade" id="best">
                <div class="wrapper">
                    <ul class="load-list load-list-four">
                        <li>
                            <div class="row text-center">
                                @foreach ($dataSale as $dataSales)
                                <form action="{{ route('addToCartProduct.website',['id' => $dataSales->id]) }}" method="post" id="addproduct{{ $dataSales->id }}">
                                    @csrf
                                    <div class="col-xs-12 col-sm-6 col-md-3" style=" margin-top: 40px;">
                                        <div class="single-product">
                                            <div class="product-img">
                                                <div class="pro-type sell">
                                                    <span>sell</span>
                                                </div>
                                                <a href="{{ route('product.slug.index',['slug' => $dataSales->slug_name]) }}">
                                                    <img  src="{{ asset('imgProduct/'.$dataSales->image) }}" alt="Product Title" />
                                                </a>
                                                <div class="actions-btn">
                                                    <input type="hidden" value="{{ $dataSales->id }}" name="product_id_cart">
                                                    <input type="hidden" value="1" name="quantity">
                                                    <input type="hidden" value="{{ $dataSales->attribute[0]->id }}" name="cart_id_attribute">
                                                    <input type="hidden" value="{{ $dataSales->price_sale > 0 ?  $dataSales->price_sale : $dataSales->price }}" name="cart_price">
                                                    <input type="hidden" value="{{ Auth::guard('customer')->id() }}" name="user_id">
                                                    <a class="addCart" data-id="{{ $dataSales->id }}"><i  class="mdi mdi-cart"></i></a>
                                                    <a href="#" data-toggle="modal" data-target="#quick-view_{{ $dataSales->slug_name }}"><i class="mdi mdi-eye"></i></a>
                                                    <a style="cursor: pointer" class="addWishList" data-id="{{ $dataSales->id }}" data-user-id="{{ Auth::guard('customer')->id() }}"><i class="mdi mdi-heart"></i></a>
                                                </div>
                                            </div>
                                            <div class="product-dsc">
                                                <p><a href="#">{{ $dataSales->name }}</a></p>
                                                @if ($dataSales->price_sale > 0)
                                                    <span>${{ $dataSales->price_sale }}
                                                    <del>${{ number_format($dataSales->price,2) }}</del>
                                                </span>
                                                @else
                                                    <span>${{ number_format($dataSales->price ,2)}}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                @endforeach
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="service-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section-title text-center">
                    <h2>Our Service</h2>
                </div>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-sm-4">
                <div class="service-text">
                    <i class="mdi mdi-truck"></i>
                    <h4>home delivery</h4>
                    <p>Contrary to popular belief, Lorem Ipsum is <br /> not simply random text.</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="service-text">
                    <i class="mdi mdi-lock"></i>
                    <h4>PAYMENT SECURED</h4>
                    <p>Contrary to popular belief, Lorem Ipsum is <br /> not simply random text.</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="service-text">
                    <i class="mdi mdi-rotate-left"></i>
                    <h4>30 days money back</h4>
                    <p>Contrary to popular belief, Lorem Ipsum is <br /> not simply random text.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="latest-blog section-padding extra-padding">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section-title text-center">
                    <h2>Latest Blog</h2>
                </div>
            </div>
        </div>
        <div class="wrapper">
            <ul class="load-list load-list-blog">
                <li>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="l-blog-text">
                                <div class="banner"><a href="single-blog.html"><img src="assetsWebsite1/img/blog/1.jpg" alt="" /></a></div>
                                <div class="s-blog-text">
                                    <h4><a href="single-blog.html">Fashion style fine arts drawing</a></h4>
                                    <span>By : <a href="#">Rakib</a> | <a href="#">210 Like</a> | <a href="#">69 Comments</a></span>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour....</p>
                                </div>
                                <div class="date-read clearfix">
                                    <a href="#"><i class="mdi mdi-clock"></i> jun 25, 2016</a>
                                    <a href="single-blog.html">read more</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="l-blog-text">
                                <div class="banner"><a href="single-blog.html"><img src="assetsWebsite1/img/blog/2.jpg" alt="" /></a></div>
                                <div class="s-blog-text">
                                    <h4><a href="single-blog.html">women’s Fashion style 2016</a></h4>
                                    <span>By : <a href="#">Rakib</a> | <a href="#">210 Like</a> | <a href="#">69 Comments</a></span>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour....</p>
                                </div>
                                <div class="date-read clearfix">
                                    <a href="#"><i class="mdi mdi-clock"></i> jun 15, 2016</a>
                                    <a href="single-blog.html">read more</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="l-blog-text">
                                <div class="banner"><a href="single-blog.html"><img src="assetsWebsite1/img/blog/3.jpg" alt="" /></a></div>
                                <div class="s-blog-text">
                                    <h4><a href="single-blog.html">women’s winter Fashion style</a></h4>
                                    <span>By : <a href="#">Rakib</a> | <a href="#">210 Like</a> | <a href="#">69 Comments</a></span>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour....</p>
                                </div>
                                <div class="date-read clearfix">
                                    <a href="#"><i class="mdi mdi-clock"></i> jun 22, 2016</a>
                                    <a href="single-blog.html">read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="l-blog-text">
                                <div class="banner"><a href="single-blog.html"><img src="assetsWebsite1/img/blog/3.jpg" alt="" /></a></div>
                                <div class="s-blog-text">
                                    <h4><a href="single-blog.html">women’s winter Fashion style</a></h4>
                                    <span>By : <a href="#">Rakib</a> | <a href="#">210 Like</a> | <a href="#">69 Comments</a></span>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour....</p>
                                </div>
                                <div class="date-read clearfix">
                                    <a href="#"><i class="mdi mdi-clock"></i> jun 22, 2016</a>
                                    <a href="single-blog.html">read more</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="l-blog-text">
                                <div class="banner"><a href="single-blog.html"><img src="assetsWebsite1/img/blog/1.jpg" alt="" /></a></div>
                                <div class="s-blog-text">
                                    <h4><a href="single-blog.html">Fashion style fine arts drawing</a></h4>
                                    <span>By : <a href="#">Rakib</a> | <a href="#">210 Like</a> | <a href="#">69 Comments</a></span>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour....</p>
                                </div>
                                <div class="date-read clearfix">
                                    <a href="#"><i class="mdi mdi-clock"></i> jun 25, 2016</a>
                                    <a href="single-blog.html">read more</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="l-blog-text">
                                <div class="banner"><a href="single-blog.html"><img src="assetsWebsite1/img/blog/2.jpg" alt="" /></a></div>
                                <div class="s-blog-text">
                                    <h4><a href="single-blog.html">women’s Fashion style 2016</a></h4>
                                    <span>By : <a href="#">Rakib</a> | <a href="#">210 Like</a> | <a href="#">69 Comments</a></span>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour....</p>
                                </div>
                                <div class="date-read clearfix">
                                    <a href="#"><i class="mdi mdi-clock"></i> jun 15, 2016</a>
                                    <a href="single-blog.html">read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            <button id="load-more-blog">Load More</button>
        </div>
    </div>
</section>

@foreach ( $productDetailModalss as  $productDetailModals)
<div class="product-details quick-view modal animated zoomInUp" id="quick-view_{{  $productDetailModals->slug_name }}">
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
                                                            @if ($productDetailModals->price_sale > 0)
                                                            <div class="pro-type sell">
                                                                <span>sell</span>
                                                            </div>
                                                            @endif
                                                            <a class="simpleLens-image" data-lens-image="{{ asset('imgProduct/' . $productDetailModals->image ) }}" href="#"><img src="{{ asset('imgProduct/' . $productDetailModals->image ) }}" alt="" class="simpleLens-big-image"></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <form action="{{ route('addToCartProduct.website',['id' => $productDetailModals->id]) }}" method="post" id="addproduct{{ $productDetailModals->id }}">
                                        @csrf
                                        <div class="col-xs-12 col-sm-7 col-md-8">
                                            <div class="quick-right">
                                                <div class="list-text">
                                                    <h3>{{ $productDetailModals->name }}</h3>
                                                    <span>Summer men’s fashion</span>
                                                    <div class="ratting floatright">
                                                        <p>( {{ $productDetailModals->comments->count() }} Comments )</p>
                                                    </div>
                                                    <h5>
                                                        @if ($productDetailModals->price_sale > 0)
                                                            <del>${{ number_format($productDetailModals->price,2) }}</del> ${{ number_format($productDetailModals->price_sale ,2)}}
                                                        @else
                                                            <del></del> ${{ number_format($productDetailModals->price,2) }}
                                                        @endif
                                                    </h5>
                                                    <p>{{ $productDetailModals->infomation }}</p>
                                                    <div class="all-choose">
                                                        <div class="s-shoose" style=" display: flex; align-items: center; ">
                                                            <h5>size</h5>
                                                            <div class="size-drop">
                                                                <div class="btn-group">
                                                                    <div class="select-wrap">
                                                                        <select name="cart_id_attribute" data-id="{{ $productDetailModals->id }}" id="myselect1_{{ $productDetailModals->id }}" class="form-control target">
                                                                            @foreach ($productDetailModals->attribute as $productDetailModalSize)
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
                                                                    <input type="text" value="1" name="quantity" id="quantity1_{{ $productDetailModals->id }}" class="plus-minus-box">
                                                                    <a class="inc qtybutton">+</a>
                                                                </div>
                                                                <div style="margin-left: 20px" class="icon pushQuantity_{{ $productDetailModals->id }}"><span class="ion-ios-arrow-down">( Number of products left {{ $productDetailModals->attribute[0]->amount }} )</span></div>
                                                        </div>
                                                    </div>
                                                    <div class="list-btn">
                                                    <input type="hidden" value="{{ $productDetailModals->price_sale > 0 ?  $productDetailModals->price_sale : $productDetailModals->price }}" name="cart_price">
                                                    <input type="hidden" value="{{ Auth::guard('customer')->id() }}" name="user_id">
                                                    <input type="hidden" value="{{ $productDetailModals->id }}" name="product_id_cart">
                                                    <input type="hidden" value="{{ $productDetailModals->price_sale > 0 ? $productDetailModals->price_sale : $productDetailModals->price }}" name="price_cart_product">
                                                    <a class="addCart-2 addSizeClass_{{ $productDetailModals->id }}"  data-id="{{ $productDetailModals->id }}">add to cart</a>
                                                    <a style="cursor: pointer" class="addWishList" data-id="{{ $productDetailModals->id }}" data-user-id="{{ Auth::guard('customer')->id() }}">wishlist</a>
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
