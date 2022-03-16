<header class="header-area header-style-1 header-height-2">
    <div class="mobile-promotion">
        <span>Grand opening, <strong>up to 15%</strong> off all items. Only <strong>3 days</strong> left</span>
    </div>
    <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
        <div class="container">
            @foreach ($announcements as $announcement)
                @include('frontend.partials.announcement')
            @endforeach
            <div class="header-wrap">
                <div class="logo logo-width-1">
                    <a href="/"><img src="{{ asset('assets/frontend/imgs/theme/logo.svg') }}" alt="logo"/></a>
                </div>
                <div class="header-right">
                    @include('frontend.partials.search-form')
                    <div class="header-action-right">
                        <div class="header-action-2">
                            @auth
                                <div class="header-action-icon-2">
                                    <a href="#">
                                        <img class="svgInject" alt="Nest"
                                             src="{{ asset('assets/frontend/imgs/theme/icons/icon-compare.svg') }}"/>
                                        <span class="pro-count blue">{{ $currentUser->getPoints() }}</span>
                                    </a>
                                    <a href="#"><span class="lable ml-0">Points</span></a>
                                </div>

                                <div class="header-action-icon-2">
                                    <a href="shop-wishlist.html">
                                        <img class="svgInject" alt="Nest"
                                             src="{{ asset('assets/frontend/imgs/theme/icons/icon-heart.svg') }}"/>
                                        <span class="pro-count blue">{{ $currentUser->watchlistCount() }}</span>
                                    </a>
                                    <a href="{{ route('watchlist.show', $currentUser->id) }}"><span class="lable">Watchlist</span></a>
                                </div>
                            @endauth
                            <div class="header-action-icon-2">
                                <a class="mini-cart-icon" href="shop-cart.html">
                                    <img alt="Nest"
                                         src="{{ asset('assets/frontend/imgs/theme/icons/icon-cart.svg') }}"/>
                                    <span class="pro-count blue">2</span>
                                </a>
                                <a href="shop-cart.html"><span class="lable">Cart</span></a>
                                <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                    <ul>
                                        <li>
                                            <div class="shopping-cart-img">
                                                <a href="shop-product-right.html"><img alt="Nest"
                                                                                       src="{{ asset('assets/frontend/imgs/shop/thumbnail-3.jpg') }}"/></a>
                                            </div>
                                            <div class="shopping-cart-title">
                                                <h4><a href="shop-product-right.html">Daisy Casual Bag</a></h4>
                                                <h4><span>1 × </span>$800.00</h4>
                                            </div>
                                            <div class="shopping-cart-delete">
                                                <a href="#"><i class="fi-rs-cross-small"></i></a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="shopping-cart-img">
                                                <a href="shop-product-right.html"><img alt="Nest"
                                                                                       src="{{ asset('assets/frontend/imgs/shop/thumbnail-2.jpg') }}"/></a>
                                            </div>
                                            <div class="shopping-cart-title">
                                                <h4><a href="shop-product-right.html">Corduroy Shirts</a></h4>
                                                <h4><span>1 × </span>$3200.00</h4>
                                            </div>
                                            <div class="shopping-cart-delete">
                                                <a href="#"><i class="fi-rs-cross-small"></i></a>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="shopping-cart-footer">
                                        <div class="shopping-cart-total">
                                            <h4>Total <span>$4000.00</span></h4>
                                        </div>
                                        <div class="shopping-cart-button">
                                            <a href="shop-cart.html" class="outline">View cart</a>
                                            <a href="shop-checkout.html">Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @include('frontend.partials.user-menu')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom header-bottom-bg-color sticky-bar">
        <div class="container">
            <div class="header-wrap header-space-between position-relative">
                <div class="logo logo-width-1 d-block d-lg-none">
                    <a href="index.html"><img src="{{ asset('assets/frontend/imgs/theme/logo.svg') }}" alt="logo"/></a>
                </div>
                <div class="header-nav d-none d-lg-flex">
                    <div class="main-categori-wrap d-none d-lg-block">
                        <a class="categories-button-active" href="#">
                            <span class="fi-rs-apps"></span> <span class="et">Browse</span> All Categories
                            <i class="fi-rs-angle-down"></i>
                        </a>
                        <div class="categories-dropdown-wrap categories-dropdown-active-large font-heading">
                            <div class="d-flex categori-dropdown-inner">
                                <ul>
                                    <li>
                                        <a href="shop-grid-right.html"> <img
                                                src="{{ asset('assets/frontend/imgs/theme/icons/category-1.svg') }}"
                                                alt=""/>Milks and Dairies</a>
                                    </li>
                                    <li>
                                        <a href="shop-grid-right.html"> <img
                                                src="{{ asset('assets/frontend/imgs/theme/icons/category-2.svg') }}"
                                                alt=""/>Clothing & beauty</a>
                                    </li>
                                    <li>
                                        <a href="shop-grid-right.html"> <img
                                                src="{{ asset('assets/frontend/imgs/theme/icons/category-3.svg') }}"
                                                alt=""/>Pet Foods & Toy</a>
                                    </li>
                                    <li>
                                        <a href="shop-grid-right.html"> <img
                                                src="{{ asset('assets/frontend/imgs/theme/icons/category-4.svg') }}"
                                                alt=""/>Baking material</a>
                                    </li>
                                    <li>
                                        <a href="shop-grid-right.html"> <img
                                                src="{{ asset('assets/frontend/imgs/theme/icons/category-5.svg') }}"
                                                alt=""/>Fresh Fruit</a>
                                    </li>
                                </ul>
                                <ul class="end">
                                    <li>
                                        <a href="shop-grid-right.html"> <img
                                                src="{{ asset('assets/frontend/imgs/theme/icons/category-6.svg') }}"
                                                alt=""/>Wines & Drinks</a>
                                    </li>
                                    <li>
                                        <a href="shop-grid-right.html"> <img
                                                src="{{ asset('assets/frontend/imgs/theme/icons/category-7.svg') }}"
                                                alt=""/>Fresh Seafood</a>
                                    </li>
                                    <li>
                                        <a href="shop-grid-right.html"> <img
                                                src="{{ asset('assets/frontend/imgs/theme/icons/category-8.svg') }}"
                                                alt=""/>Fast food</a>
                                    </li>
                                    <li>
                                        <a href="shop-grid-right.html"> <img
                                                src="{{ asset('assets/frontend/imgs/theme/icons/category-9.svg') }}"
                                                alt=""/>Vegetables</a>
                                    </li>
                                    <li>
                                        <a href="shop-grid-right.html"> <img
                                                src="{{ asset('assets/frontend/imgs/theme/icons/category-10.svg') }}"
                                                alt=""/>Bread and Juice</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="more_slide_open" style="display: none">
                                <div class="d-flex categori-dropdown-inner">
                                    <ul>
                                        <li>
                                            <a href="shop-grid-right.html"> <img
                                                    src="{{ asset('assets/frontend/imgs/theme/icons/icon-1.svg') }}"
                                                    alt=""/>Milks and Dairies</a>
                                        </li>
                                        <li>
                                            <a href="shop-grid-right.html"> <img
                                                    src="{{ asset('assets/frontend/imgs/theme/icons/icon-2.svg') }}"
                                                    alt=""/>Clothing & beauty</a>
                                        </li>
                                    </ul>
                                    <ul class="end">
                                        <li>
                                            <a href="shop-grid-right.html"> <img
                                                    src="{{ asset('assets/frontend/imgs/theme/icons/icon-3.svg') }}"
                                                    alt=""/>Wines & Drinks</a>
                                        </li>
                                        <li>
                                            <a href="shop-grid-right.html"> <img
                                                    src="{{ asset('assets/frontend/imgs/theme/icons/icon-4.svg') }}"
                                                    alt=""/>Fresh Seafood</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="more_categories"><span class="icon"></span> <span class="heading-sm-1">Show more...</span>
                            </div>
                        </div>
                    </div>
                    <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading">
                        <nav>
                            <ul>
                                @foreach ($header as $item)
                                    <li>
                                        <a href="{{ route('page.show', $item->slug) }}">{{ $item->title }}</a>
                                    </li>
                                @endforeach
                                <li>
                                    <a href="{{ route('bounty.index') }}">Bounties</a>
                                </li>
                                <li>
                                    <a href="{{ route('contact.show') }}">Contact</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="hotline d-none d-lg-flex">
                    <img src="{{ asset('assets/frontend/imgs/theme/icons/icon-headphone.svg') }}" alt="hotline"/>
                    <p>1900 - 888<span>24/7 Support Center</span></p>
                </div>
                <div class="header-action-icon-2 d-block d-lg-none">
                    <div class="burger-icon burger-icon-white">
                        <span class="burger-icon-top"></span>
                        <span class="burger-icon-mid"></span>
                        <span class="burger-icon-bottom"></span>
                    </div>
                </div>
                <div class="header-action-right d-block d-lg-none">
                    <div class="header-action-2">
                        <div class="header-action-icon-2">
                            <a href="shop-wishlist.html">
                                <img alt="Nest" src="{{ asset('assets/frontend/imgs/theme/icons/icon-heart.svg') }}"/>
                                <span class="pro-count white">4</span>
                            </a>
                        </div>
                        <div class="header-action-icon-2">
                            <a class="mini-cart-icon" href="shop-cart.html">
                                <img alt="Nest" src="{{ asset('assets/frontend/imgs/theme/icons/icon-cart.svg') }}"/>
                                <span class="pro-count white">2</span>
                            </a>
                            <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                <ul>
                                    <li>
                                        <div class="shopping-cart-img">
                                            <a href="shop-product-right.html"><img alt="Nest"
                                                                                   src="{{ asset('assets/frontend/imgs/shop/thumbnail-3.jpg') }}"/></a>
                                        </div>
                                        <div class="shopping-cart-title">
                                            <h4><a href="shop-product-right.html">Plain Striola Shirts</a></h4>
                                            <h3><span>1 × </span>$800.00</h3>
                                        </div>
                                        <div class="shopping-cart-delete">
                                            <a href="#"><i class="fi-rs-cross-small"></i></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="shopping-cart-img">
                                            <a href="shop-product-right.html"><img alt="Nest"
                                                                                   src="{{ asset('assets/frontend/imgs/shop/thumbnail-4.jpg') }}"/></a>
                                        </div>
                                        <div class="shopping-cart-title">
                                            <h4><a href="shop-product-right.html">Macbook Pro 2022</a></h4>
                                            <h3><span>1 × </span>$3500.00</h3>
                                        </div>
                                        <div class="shopping-cart-delete">
                                            <a href="#"><i class="fi-rs-cross-small"></i></a>
                                        </div>
                                    </li>
                                </ul>
                                <div class="shopping-cart-footer">
                                    <div class="shopping-cart-total">
                                        <h4>Total <span>$383.00</span></h4>
                                    </div>
                                    <div class="shopping-cart-button">
                                        <a href="shop-cart.html">View cart</a>
                                        <a href="shop-checkout.html">Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
