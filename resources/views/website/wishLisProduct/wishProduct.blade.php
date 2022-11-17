@extends('website.master')
@section('content')
    <div class="pages-title section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="pages-title-text text-center">
                        <h2>Wishlist</h2>
                        <ul class="text-left">
                            <li><a href="index.html">Home </a></li>
                            <li><span> // </span>Wishlist</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="pages wishlist-page section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    @if ($getWishListProduct->count() <=0)
                    <div class="pages error-page section-padding">
                        <div class="container text-center">
                            <div class="error-content">
                                <svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" fill="currentColor" class="bi bi-bag-heart" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5Zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0ZM14 14V5H2v9a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1ZM8 7.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132Z"/>
                                  </svg>
                                <h4>Your favorites list is empty..</h4>
                                <a href="{{ route('website.index') }}">
                                    <p style="text-transform: none;text-decoration: underline;">Please add to the list.</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="table-responsive padding60">
                        <table class="wishlist-table text-center">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity </th>
                                    <th>Add To Cart</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($getWishListProduct as $getWishListProducts )
                                <form action="{{ route('addToCartProduct.website',['id' => $getWishListProducts->id]) }}" method="POST">
                                    <tr>
                                        <td class="td-img text-left">
                                            <a href="{{route('product.slug.index',['slug' => $getWishListProducts->slug_name]) }}"><img src="{{ asset('imgProduct/' .$getWishListProducts->image) }}" alt="Add Product"></a>
                                            <div class="items-dsc">
                                                <h5><a href="{{route('product.slug.index',['slug' => $getWishListProducts->slug_name]) }}">{{ $getWishListProducts->name }}</a></h5>
                                                <p class="itemcolor">Size   :
                                                    <select class="custom-select custom-select-sm" id="myselect3_{{ $getWishListProducts->id}}" name="cart_id_attribute" required="" style=" width: 40px; ">
                                                        @foreach ($getWishListProducts->attribute as $getWishListProductsAttributeValue)
                                                        <option value="{{ $getWishListProductsAttributeValue->id }}">{{ $getWishListProductsAttributeValue->size }}</option>
                                                        @endforeach
                                                    </select>
                                                    </p>
                                            </div>

                                        </td>
                                        <td >${{ $getWishListProducts->price_sale > 0 ? number_format($getWishListProducts->price_sale,2) : number_format($getWishListProducts->price,2) }}</td>
                                        <td>
                                            <div class="plus-minus">
                                                <a class="dec qtybutton">-</a>
                                                <input type="text" value="1" min="1" max="100" id="quantity3_{{ $getWishListProducts->id }}" name="quantity" class="plus-minus-box">
                                                <a class="inc qtybutton">+</a>
                                              </div>
                                        </td>
                                        <td>

                                            <div class="submit-text">
                                                <input type="hidden" value="{{ $getWishListProducts->price_sale > 0 ?  $getWishListProducts->price_sale : $getWishListProducts->price }}" name="cart_price">
                                                <input type="hidden" value="{{ Auth::guard('customer')->id() }}" name="user_id">
                                            <input type="hidden" value="{{ $getWishListProducts->id }}" name="product_id_cart">
                                                <a class="addCart-3" data-id="{{ $getWishListProducts->id }}">Add to cart</a>
                                            </div>
                                        </td>
                                        <td><a href="{{ route('deleteWishListProduct.website',['id'=>$getWishListProducts->id_wish_list]) }}"><i class="mdi mdi-close" title="Remove this product"></i></a></td>
                                    </tr>
                                </form>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="pagnation-ul">
                                    {{ $getWishListProduct->links('website.categoryProduct.my-pagination.myPagination') }}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </section>

@endsection
