@extends('website.master')
@section('content')
<div class="pages-title section-padding">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="pages-title-text text-center">
                    <h2>Product Grid View</h2>
                    <ul class="text-left">
                        <li><a href="{{ route('product.all.index') }}">Home </a></li>
                        <li><span> // </span>Shop</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="collection-area collection-area2 section-padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="single-colect banner collect-one">
                    <a href="#"><img src="/assetsWebsite1/img/collect/4.jpg" alt=""></a>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="colect-text ">
                    <h4><a href="#">Fashion Collection 2016</a></h4>
                    <h5>big sale of the men 2016 fashion <br> Up To 23% Off!</h5>
                    <a href="{{ route('product.all.index') }}">Shop Now <i class="mdi mdi-arrow-right"></i></a>
                </div>
                <div class="collect-img banner margin single-colect">
                    <a href="#"><img src="/assetsWebsite1/img/collect/5.jpg" alt=""></a>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="collect-img banner single-colect">
                    <a href="#"><img src="/assetsWebsite1/img/collect/6.jpg" alt=""></a>
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



<section class="pages products-page section-padding-bottom">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-3">
                <div class="sidebar left-sidebar">
                    <div class="s-side-text">
                        <div class="sidebar-title clearfix">
                            <h4 class="floatleft">Categories</h4>
                            <h5 class="floatright"><a href="#">All</a></h5>
                        </div>
                        <div class="categories left-right-p">
                            <ul id="accordion" class="panel-group clearfix">
                                <li class="panel">
                                    <div data-toggle="collapse" data-parent="#accordion" data-target="#collapse2">
                                        <div class="medium-a">
                                            Women & Men
                                        </div>
                                    </div>
                                    <div class="paypal-dsc panel-collapse collapse" id="collapse2">
                                        <div class="normal-a">
                                            @foreach ($category as $dataDanhMucs)
                                            <a href="{{ route('product.category.index',['namecategory' => $dataDanhMucs->namecategory]) }}">{{ $dataDanhMucs->namecategory }}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                </li>
                                <li class="panel">
                                    <div data-toggle="collapse" data-parent="#accordion" data-target="#collapse3">
                                        <div class="medium-a">
                                            Sale
                                        </div>
                                    </div>
                                    <div class="paypal-dsc panel-collapse collapse" id="collapse3">
                                        <div class="normal-a">
                                            <a href="{{ route('product.category.sale.index') }}">Sale Product</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="s-side-text">
                        <div class="sidebar-title" style=" text-align: center; ">
                            <h4>price & name</h4>
                        </div>
                        <div class="size-select clearfix">
                            <a href="{{ route('searchAscendingProduct.index') }}" style=" width: 25% !important; ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-arrow-up-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M14 2.5a.5.5 0 0 0-.5-.5h-6a.5.5 0 0 0 0 1h4.793L2.146 13.146a.5.5 0 0 0 .708.708L13 3.707V8.5a.5.5 0 0 0 1 0v-6z"/>
                              </svg>
                            </a>
                            <a href="{{ route('searchHighDownProduct.index') }}" style=" width: 25% !important; ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-arrow-down-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M14 13.5a.5.5 0 0 1-.5.5h-6a.5.5 0 0 1 0-1h4.793L2.146 2.854a.5.5 0 1 1 .708-.708L13 12.293V7.5a.5.5 0 0 1 1 0v6z"/>
                                  </svg>
                            </a>
                            <a href="{{ route('searchAtoZProduct.index') }}" style=" width: 25% !important; ">
                                A
                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                  </svg>
                                Z
                            </a>
                            <a href="{{ route('searchZtoAProduct.index') }}" style=" width: 25% !important; ">
                                Z
                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                  </svg>
                                A
                            </a>
                        </div>
                    </div>
                    <div class="s-side-text">
                        <div class="sidebar-title clearfix">
                            <h4 class="floatleft">size</h4>
                            <h5 class="floatright"><a href="{{ route('product.all.index') }}">All</a></h5>
                        </div>
                        <div class="size-select clearfix">
                            <a href="{{ route('searchSizeProduct.index',['size' => "S"]) }}">s</a>
                            <a href="{{ route('searchSizeProduct.index',['size' => "M"]) }}">m</a>
                            <a href="{{ route('searchSizeProduct.index',['size' => "L"]) }}">l</a>
                            <a href="{{ route('searchSizeProduct.index',['size' => "SL"]) }}">sl</a>
                            <a href="{{ route('searchSizeProduct.index',['size' => "XL"]) }}">xl</a>
                        </div>
                    </div>
                    <div class="s-side-text">
                        <div class="sidebar-title clearfix">
                            <h4 class="floatleft">brands</h4>
                            <h5 class="floatright"><a href="#">All</a></h5>
                        </div>
                        <div class="brands-select clearfix">
                            <ul>
                                <li>
                                    <a href="#">Offset</a>
                                    <a href="#">Ecko Untid</a>
                                    <a href="#">Addidas</a>
                                    <a href="#">Custo</a>
                                    <a href="#">Guccies</a>
                                </li>
                                <li>
                                    <a href="#">Unlimited</a>
                                    <a href="#">Shoes</a>
                                    <a href="#">Watch</a>
                                    <a href="#">Color Full</a>
                                    <a href="#">Best choice</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="s-side-text">
                        <div class="banner clearfix">
                            <a href="#"><img src="img/products/banner.jpg" alt=""></a>
                            <div class="banner-text">
                                <h2>best</h2> <br>
                                <h2 class="banner-brand">brand</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-8 col-md-9">
                <div class="right-products">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="section-title clearfix">
                                <ul>
                                    <li>
                                        <ul class="nav-view">
                                            <li class="active"><a data-toggle="tab" href="#grid"> <i class="mdi mdi-view-module"></i> </a></li>
                                            <li><a data-toggle="tab" href="#list"> <i class="mdi mdi-view-list"></i> </a></li>
                                        </ul>
                                    </li>
                                    <li class="sort-by floatright">
                                        Showing 1-{{ $searchSizeProduct->count() }} of {{ $searchSizeProductCount->count() }} Results
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="tab-content grid-content">
                            <div class="tab-pane fade in active text-center" id="grid">
                                @foreach ($searchSizeProduct as $searchSizeProducts)
                                <div class="col-xs-12 col-sm-6 col-md-4">
                                    <div class="single-product">
                                        <div class="product-img">
                                                    @php
                                                    $start = \Carbon\Carbon::parse($searchSizeProducts->created_at);
                                                    $now = \Carbon\Carbon::now();
                                                    $days_count = $start->diffInDays($now);
                                            @endphp
                                            @if ($days_count <= 15)
                                            <div class="pro-type">
                                                <span>new</span>
                                            </div>
                                            @endif
                                            @if ($searchSizeProducts->price_sale > 0)
                                            <div class="pro-type sell">
                                                <span>sell</span>
                                            </div>
                                            @endif
                                            <a href="{{ route('product.slug.index',['slug' => $searchSizeProducts->slug_name]) }}"><img src="{{ asset('imgProduct/'. $searchSizeProducts->image) }}" alt="Product Title"></a>
                                            <div class="actions-btn">
                                                <input type="hidden" value="{{ $searchSizeProducts->id }}" name="product_id_cart">
                                                <input type="hidden" value="1" name="quantity">
                                                <input type="hidden" value="{{ $searchSizeProducts->price_sale > 0 ? $searchSizeProducts->price_sale : $searchSizeProducts->price }}" name="cart_price">
                                                <input type="hidden" value="{{ $searchSizeProducts->attribute[0]->size }}" name="cart_id_attribute">
                                                <input type="hidden" value="{{ Auth::guard('customer')->id() }}" name="user_id">
                                                <a class="addCart" data-id="{{ $searchSizeProducts->id }}"><i  class="mdi mdi-cart"></i></a>
                                                <a href="#" data-toggle="modal" data-target="#quick-view_{{ $searchSizeProducts->slug_name }}"><i class="mdi mdi-eye"></i></a>
                                                <a style="cursor: pointer" class="addWishList" data-id="{{ $searchSizeProducts->id }}" data-user-id="{{ Auth::guard('customer')->id() }}"><i class="mdi mdi-heart"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-dsc">
                                            <p><a href="{{ route('product.slug.index',['slug' => $searchSizeProducts->slug_name]) }}">{{ $searchSizeProducts->name }}</a></p>
                                            <div class="ratting">
                                                <i class="mdi mdi-star"></i>
                                                <i class="mdi mdi-star"></i>
                                                <i class="mdi mdi-star"></i>
                                                <i class="mdi mdi-star-half"></i>
                                                <i class="mdi mdi-star-outline"></i>
                                            </div>
                                            @if ($searchSizeProducts->price_sale > 0)
                                            <span>${{ $searchSizeProducts->price_sale }}
                                                <del>${{ number_format($searchSizeProducts->price,2) }}</del>
                                            </span>
                                            @else
                                            <span>${{ number_format($searchSizeProducts->price ,2)}}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            <div class="tab-pane fade in" id="list">
                                <div class="col-xs-12">
                                    @foreach ($searchSizeProduct as $searchSizeProducts)
                                    <div class="single-list-view">
                                        <div class="row">
                                            <div class="col-xs-12 col-md-4">
                                                <div class="list-img">
                                                    <div class="product-img">
                                                        @php
                                                        $start = \Carbon\Carbon::parse($searchSizeProducts->created_at);
                                                        $now = \Carbon\Carbon::now();
                                                        $days_count = $start->diffInDays($now);
                                                    @endphp
                                                        @if ($days_count <= 15)
                                                        <div class="pro-type">
                                                            <span>new</span>
                                                        </div>
                                                    @endif
                                                        @if ($searchSizeProducts->price_sale > 0)
                                                            <div class="pro-type sell">
                                                                <span>sell</span>
                                                            </div>
                                                        @endif
                                                        <a href="{{ route('product.slug.index',['slug' => $searchSizeProducts->slug_name]) }}"><img src="{{ asset('imgProduct/'. $searchSizeProducts->image) }}" alt="Product Title"></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-md-8">
                                                <div class="list-text">
                                                    <h3>{{ $searchSizeProducts->name }}</h3>
                                                    <span>Summer men’s fashion</span>
                                                    <div class="ratting floatright">
                                                        <p>( {{ $searchSizeProducts->comments->count() }} Comments )</p>
                                                    </div>
                                                    <h5>
                                                        @if ($searchSizeProducts->price_sale > 0)
                                                            <del>${{ number_format($searchSizeProducts->price,2) }}</del>
                                                            ${{ number_format($searchSizeProducts->price_sale,2) }}
                                                        @else
                                                            ${{ number_format($searchSizeProducts->price,2) }}
                                                        @endif
                                                    </h5>
                                                    <p>{{ $searchSizeProducts->infomation }}</p>
                                                    <div class="list-btn">
                                                        <input type="hidden" value="{{ $searchSizeProducts->id }}" name="product_id_cart">
                                                        <input type="hidden" value="1" name="quantity">
                                                        <input type="hidden" value="{{ $searchSizeProducts->price_sale > 0 ? $searchSizeProducts->price_sale : $searchSizeProducts->price }}" name="cart_price">
                                                        <input type="hidden" value="{{ $searchSizeProducts->attribute[0]->size }}" name="cart_id_attribute">
                                                        <input type="hidden" value="{{ Auth::guard('customer')->id() }}" name="user_id">
                                                        <a class="addCart" data-id="{{ $searchSizeProducts->id }}"><i  class="mdi mdi-cart"></i></a>
                                                        <a style="cursor: pointer" class="addWishList" data-id="{{ $searchSizeProducts->id }}" data-user-id="{{ Auth::guard('customer')->id() }}">wishlist</a>
                                                        <a href="#" data-toggle="modal" data-target="#quick-view_{{ $searchSizeProducts->slug_name }}">zoom</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="pagnation-ul">
                                {{ $searchSizeProduct->links('website.categoryProduct.my-pagination.myPagination') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@foreach ($productDetailModalss as $productDetailModals)
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
                                                            @php
                                                            $start = \Carbon\Carbon::parse($productDetailModals->created_at);
                                                            $now = \Carbon\Carbon::now();
                                                            $days_count = $start->diffInDays($now);
                                                        @endphp
                                                            @if ($days_count <= 15)
                                                            <div class="pro-type">
                                                                <span>new</span>
                                                            </div>
                                                        @endif
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
                                                                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                                                    <select name="cart_id_attribute" id="myselect1_{{ $productDetailModals->id }}" class="form-control">
                                                                        @foreach ($productDetailModals->attribute as $productDetailModalSize)
                                                                           <option value="{{ $productDetailModalSize->size }}">{{ $productDetailModalSize->size }}</option>
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
                                                                <input type="text" value="1" name="quantity" id="quantity1_{{ $productDetailModals->id }}"  class="plus-minus-box">
                                                                <a class="inc qtybutton">+</a>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="list-btn">
                                                    <input type="hidden" value="{{ $productDetailModals->price_sale > 0 ?  $productDetailModals->price_sale : $productDetailModals->price }}" name="cart_price">
                                                    <input type="hidden" value="1" name="quantity">
                                                    <input type="hidden" value="{{ Auth::guard('customer')->id() }}" name="user_id">
                                                    <input type="hidden" value="{{ $productDetailModals->id }}" name="product_id_cart">
                                                    <input type="hidden" value="{{ $productDetailModals->price_sale > 0 ? $productDetailModals->price_sale : $productDetailModals->price }}" name="price_cart_product">
                                                    <a class="addCart-2" data-id="{{ $productDetailModals->id }}">add to cart</a>
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
