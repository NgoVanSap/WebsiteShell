<header class="header-one">
    <div class="container-fluid text-center">
        <div class="row">
            <div class="col-sm-2">
                <div class="logo">
                    <a href="{{ route('website.index') }}"><img src="/assetsWebsite1/img/logo.png" alt="Sellshop" /></a>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="header-middel">
                    <div class="middel-top clearfix">
                        <div class="left floatleft">
                            <p><i class="mdi mdi-clock"></i> Mon-Fri : 09:00-19:00</p>
                        </div>
                        <div class="center floatleft">
                            <form action="{{ route('searchAjaxProduct.website') }}" method="get">
                                <button type="submit"><i class="mdi mdi-magnify"></i></button>
                                <input type="text" id="searchProduct" name="searchProduct" placeholder="Tìm kiếm sản phẩm..." />
                            </form>
                            <div class="centerSearch" id="addClass">
                            </div>
                        </div>
                        <div class="right floatleft">
                            <ul class="clearfix">
                                <li><a style="cursor: pointer"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                                    <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z"/>
                                  </svg></a>
                                    <ul>
                                        @if (empty(Auth::guard('customer')->check()))
                                        <li><a style=" font-size: 12px; " href="{{ route('viewLoginRegister.website') }}">Login / Registar</a></li>
                                        @else
                                        <li style=" display: flex; "><img src="../assetsWebsite1/img/welcome-back.png" alt="" style=" height: 30px; "> <a style="font-size: 10px;padding: 5px 3px !important;line-height: 17px;">{{ Auth::guard('customer')->user()->usernameCus }}</a></li>
                                        <li><a style="font-size: 13px;padding: 7px 1px !important;position: relative;display: flex;align-items: center;" title="User logout" href="{{ route('customerLogout.website') }}">
                                            <span style=" margin-left: 5px; margin-top: 3px; ">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-closed-fill" viewBox="0 0 16 16">
                                                    <path d="M12 1a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2a1 1 0 0 1 1-1h8zm-2 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                                                  </svg>
                                            </span>
                                        </a>
                                    </li>
                                        @endif
                                    </ul>
                                </li>
                                <li><a href="#"><i class="mdi mdi-settings"></i></a>
                                    <ul>
                                        <li><a href="{{ route('myAccount.website') }}">Tài khoản</a></li>
                                        <li><a href="{{ route('viewCartProduct.website') }}">Giỏ hàng</a></li>
                                        <li><a href="{{ route('viewWishListProduct.website') }}">Yêu thích</a></li>
                                        <li><a href="{{ route('viewBillCartProduct.website') }}">Thanh toán</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="mainmenu">
                        <nav>
                            <ul>
                                <li><a href="{{ route('website.index') }}">Trang chủ</a></li>
                                <li><a href="{{ route('product.all.index') }}">Cửa hàng</a>
                                    <ul class="magamenu">
                                        <li class="banner"><a href="{{ route('product.all.index') }}"><img src="/assetsWebsite1/img/maga1.png" alt="" /></a></li>
                                        <li><h5>Quần áo nam</h5>
                                            <ul>
                                                @foreach ($category as $categoryProduct)
                                                <li style=" margin-bottom: 15px; ">
                                                    <a href="{{ route('product.category.index',['namecategory' => $categoryProduct->namecategory]) }}">{{ $categoryProduct->namecategory }}</a>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="#">Trang</a>
                                    <ul class="dropdown">
                                        <li><a href="{{ route('viewWishListProduct.website') }}">Yêu thích </a></li>
                                        <li><a href="{{ route('viewBillCartProduct.website') }}">Thanh toán</a></li>
                                        <li><a href="{{ route('viewCartProduct.website') }}">Giỏ hàng</a></li>
                                    </ul>
                                </li>
                                <li><a href="blog.html">Blog</a>
                                    <ul class="dropdown">
                                        <li><a href="blog-style-1.html">Blog Style One</a></li>
                                        <li><a href="blog-style-2.html">Blog Style Two</a></li>
                                        <li><a href="single-blog.html">Single Blog</a></li>
                                    </ul>
                                </li>
                                <li><a href="about.html">About</a></li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                    <!-- mobile menu start -->
                    <div class="mobile-menu-area">
                        <div class="mobile-menu">
                            <nav id="dropdown">
                                <ul>
                                    <li><a href="index.html">Home</a></li>
                                    <li><a href="shop.html">Shop</a>
                                        <ul>
                                            <li><h5>men’s wear</h5>
                                                <ul>
                                                    <li><a href="#">Shirts & Top</a></li>
                                                    <li><a href="#">Shoes</a></li>
                                                    <li><a href="#">Dresses</a></li>
                                                    <li><a href="#">Shemwear</a></li>
                                                    <li><a href="#">Jeans</a></li>
                                                    <li><a href="#">Sweaters</a></li>
                                                    <li><a href="#">Jacket</a></li>
                                                    <li><a href="#">Men Watch</a></li>
                                                </ul>
                                            </li>
                                            <li><h5>women’s wear</h5>
                                                <ul>
                                                    <li><a href="#">Shirts & Tops</a></li>
                                                    <li><a href="#">Shoes</a></li>
                                                    <li><a href="#">Dresses</a></li>
                                                    <li><a href="#">Shemwear</a></li>
                                                    <li><a href="#">Jeans</a></li>
                                                    <li><a href="#">Sweaters</a></li>
                                                    <li><a href="#">Jacket</a></li>
                                                    <li><a href="#">Women Watch</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Pages</a>
                                        <ul>
                                            <li><a href="wishlist.html">Wishlist</a></li>
                                            <li><a href="checkout.html">Checkout</a></li>
                                            <li><a href="cart.html">Cart</a></li>
                                            <li><a href="product-grid.html">Product Grid View</a></li>
                                            <li><a href="product-list.html">Product List View</a></li>
                                            <li><a href="single-product.html">Single Product</a></li>
                                            <li><a href="error-404.html">404 page</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="blog.html">Blog</a>
                                        <ul>
                                            <li><a href="blog-style-1.html">Blog Style One</a></li>
                                            <li><a href="blog-style-2.html">Blog Style Two</a></li>
                                            <li><a href="single-blog.html">Single Blog</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="about.html">About</a></li>
                                    <li><a href="contact.html">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="cart-itmes">
                    <a class="cart-itme-a" href="{{ route('viewCartProduct.website') }}" id="add-itemcarr">

                    </a>
                    <div class="cartdrop">
                       <div class="" Check out id="append-hoverCart">

                       </div>
                        <div class="total" id="append-hoverCart-total">
                            <span >Tổng tiền:

                            </span>
                        </div>
                        <a class="goto" href="{{ route('viewCartProduct.website') }}">Giỏ hàng</a>
                        <a class="out-menu" href="{{ route('viewBillCartProduct.website') }}">Thanh toán</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
