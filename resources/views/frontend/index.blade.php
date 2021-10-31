@extends('frontend.layout.app')

@section('content')
    <!-- Best Place-->
    <section class="section novi-bg novi-bg-img section-xl section-banner-classic bg-primary text-center text-lg-left" style="background-image: url({{ asset("frontend-assets/images/home-01-1920x570.jpeg") }})">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-9">
                    <div class="banner-classic">
                        <h1>
                            The best place <span class="d-block font-weight-bold">to buy and sell!</span>
                            <img class="banner-classic-figure" src="{{ asset('frontend-assets/images/banner-arrow-184x147.png') }}" alt="" width="184" height="73"/>
                        </h1>
                        <a class="button button-icon button-icon-right button-black button-lg" href="#"><span class="icon novi-icon fa fa-chevron-right"></span>Register</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Finished Auctions-->
    <section class="section novi-bg novi-bg-img section-lg bg-white">
        <div class="container">
            <h2 class="text-center text-sm-left">Finished <span class="h2-style">Auctions</span></h2>
            <div class="row row-20">
                <div class="col-lg-3 col-sm-6">
                    <!-- Post Classic-->
                    <div class="post-classic">
                        <div class="post-classic-badge">Final price
                            <div class="post-classic-price-value">876</div>
                        </div>
                        <div class="post-classic-thumbnail">
                            <figure class="post-classic-figure"><img src="{{ asset('frontend-assets/images/page1_pic1-270x271.jpeg') }}" alt="" width="270" height="135"/>
                            </figure>
                            <div class="post-classic-caption"><a class="heading-5" href="#">Apple MacBook Pro 13'' 2.3GHz 128GB Space Gray</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <!-- Post Classic-->
                    <div class="post-classic">
                        <div class="post-classic-badge">Final price
                            <div class="post-classic-price-value">176</div>
                        </div>
                        <div class="post-classic-thumbnail">
                            <figure class="post-classic-figure"><img src="{{ asset('frontend-assets/images/page1_pic2-270x271.jpeg') }}" alt="" width="270" height="135"/>
                            </figure>
                            <div class="post-classic-caption"><a class="heading-5" href="#">Apple iPad Pro 11” Wi-Fi 64GB Silver</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <!-- Post Classic-->
                    <div class="post-classic">
                        <div class="post-classic-badge">Final price
                            <div class="post-classic-price-value">16</div>
                        </div>
                        <div class="post-classic-thumbnail">
                            <figure class="post-classic-figure"><img src="{{ asset('frontend-assets/images/page1_pic3-270x271.jpeg') }}" alt="" width="270" height="135"/>
                            </figure>
                            <div class="post-classic-caption"><a class="heading-5" href="#">Ray-Ban High Street 54mm Sunglasses</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <!-- Post Classic-->
                    <div class="post-classic">
                        <div class="post-classic-badge">Final price
                            <div class="post-classic-price-value">86</div>
                        </div>
                        <div class="post-classic-thumbnail">
                            <figure class="post-classic-figure"><img src="{{ asset('frontend-assets/images/page1_pic4-270x271.jpeg') }}" alt="" width="270" height="135"/>
                            </figure>
                            <div class="post-classic-caption"><a class="heading-5" href="#">Pier One Classic Dark Blue Ankle Boots</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Current Auctions-->
    <section class="section novi-bg novi-bg-img section-lg bg-white section-top-shadow">
        <div class="container">
            <h2 class="text-center text-sm-left">Current <span class="h2-style">Auctions</span></h2>
            <div class="row row-50 mt-50">
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <!-- Post Modern-->
                    <div class="post-modern">
                        <div class="post-modern-countdown countdown" data-format="HMS" data-until="+75500"></div>
                        <figure class="post-modern-figure"><img src="{{ asset('frontend-assets/images/page1_pic5-270x217.jpeg') }}" alt="" width="270" height="108"/>
                        </figure>
                        <div class="post-modern-caption">
                            <div class="post-modern-price">Price: $258</div>
                            <div class="post-modern-price-value">386</div>
                            <h5 class="post-modern-link"><a href="#">Apple MacBook Air 13'' 1.8GHz 128GB</a></h5><a class="button button-box-right button-primary" href="#">Submit a bid
                                <div class="button-box">
                                    <div class="button-box-text">X</div>
                                    <div class="button-box-count">3</div>
                                </div></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <!-- Post Modern-->
                    <div class="post-modern">
                        <div class="post-modern-countdown countdown" data-format="HMS" data-until="+25000"></div>
                        <figure class="post-modern-figure"><img src="{{ asset('frontend-assets/images/page1_pic6-270x217.jpeg') }}" alt="" width="270" height="108"/>
                        </figure>
                        <div class="post-modern-caption">
                            <div class="post-modern-price">Price: $258</div>
                            <div class="post-modern-price-value">11</div>
                            <h5 class="post-modern-link"><a href="#">Billieblush Girls Blue Fluffy Cardigan</a></h5><a class="button button-box-right button-primary" href="#">Submit a bid
                                <div class="button-box">
                                    <div class="button-box-text">X</div>
                                    <div class="button-box-count">3</div>
                                </div></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <!-- Post Modern-->
                    <div class="post-modern">
                        <div class="post-modern-countdown countdown" data-format="HMS" data-until="+2500"></div>
                        <figure class="post-modern-figure"><img src="{{ asset('frontend-assets/images/page1_pic7-270x217.jpeg') }}" alt="" width="270" height="108"/>
                        </figure>
                        <div class="post-modern-caption">
                            <div class="post-modern-price">Price: $258</div>
                            <div class="post-modern-price-value">86</div>
                            <h5 class="post-modern-link"><a href="#">Apple Mac mini Late 2018 (MRTT2)</a></h5><a class="button button-box-right button-primary" href="#">Submit a bid
                                <div class="button-box">
                                    <div class="button-box-text">X</div>
                                    <div class="button-box-count">3</div>
                                </div></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <!-- Post Modern-->
                    <div class="post-modern">
                        <div class="post-modern-countdown countdown" data-format="HMS" data-until="+65000"></div>
                        <figure class="post-modern-figure"><img src="{{ asset('frontend-assets/images/page1_pic8-270x217.jpeg') }}" alt="" width="270" height="108"/>
                        </figure>
                        <div class="post-modern-caption">
                            <div class="post-modern-price">Price: $258</div>
                            <div class="post-modern-price-value">27</div>
                            <h5 class="post-modern-link"><a href="#">Lacoste Lerond Leather Trainers</a></h5><a class="button button-box-right button-primary" href="#">Submit a bid
                                <div class="button-box">
                                    <div class="button-box-text">X</div>
                                    <div class="button-box-count">3</div>
                                </div></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-xl-40 mt-50 text-center text-sm-left"><a class="button button-icon button-icon-right button-black" href="#"><span class="icon novi-icon fa fa-chevron-right"></span>View all auctions</a></div>
        </div>
    </section>

    <!-- How it Works-->
    <section class="section novi-bg novi-bg-img section-lg bg-gray-100 section-top-shadow">
        <div class="container">
            <h2 class="text-center text-sm-left">How <span class="h2-style">it Works</span></h2>
            <div class="row row-50 mt-50 column-arrow">
                <div class="col-lg-3 col-sm-6">
                    <!-- Box Icon Classic-->
                    <div class="box-icon-classic">
                        <div class="box-icon-classic-icon icon novi-icon linearicons-mouse-left"></div>
                        <h4 class="box-icon-classic-title">Register</h4>
                        <p>To start using our auction, you’ll need to register. It’s completely free and requires just a few clicks!</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <!-- Box Icon Classic-->
                    <div class="box-icon-classic">
                        <div class="box-icon-classic-icon icon novi-icon linearicons-cart-exchange"></div>
                        <h4 class="box-icon-classic-title">Buy or Bid</h4>
                        <p>You can instantly buy or place a bid on any desired product right after registration on our website.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <!-- Box Icon Classic-->
                    <div class="box-icon-classic">
                        <div class="box-icon-classic-icon icon novi-icon linearicons-hammer2"></div>
                        <h4 class="box-icon-classic-title">Submit a Bid</h4>
                        <p>Submitting a bid to our auction is quick and easy. The process takes approximately 5 minutes.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <!-- Box Icon Classic-->
                    <div class="box-icon-classic">
                        <div class="box-icon-classic-icon icon novi-icon linearicons-trophy2"></div>
                        <h4 class="box-icon-classic-title">Win</h4>
                        <p>Easily win at our auction and enjoy owning the product you dream of after the bidding is closed.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Join the Winners-->
    <section
        class="parallax-container context-dark section-lg"
        data-parallax-img="{{ asset('frontend-assets/images/home-02-1920x1030.jpeg') }}"
    >
        <div class="parallax-content">
            <div class="container">
                <h2 class="text-center text-sm-left">Join <span class="h2-style">the Winners</span></h2>
                <div class="row row-sm-30 row-15 row-eight row-xs-horizontal-15">
                    <div class="col-lg-2 col-4">
                        <figure class="box-image"><img src="{{ asset('frontend-assets/images/box-image-01-270x270.png') }}" alt="" width="270" height="135"/>
                        </figure>
                    </div>
                    <div class="col-lg-2 col-4">
                        <div class="row row-sm-30 row-15 row-eight row-xs-horizontal-15">
                            <div class="col-4">
                                <figure class="box-image"><img src="{{ asset('frontend-assets/images/box-image-02-120x120.png') }}" alt="" width="120" height="60"/>
                                </figure>
                            </div>
                            <div class="col-4">
                                <figure class="box-image"><img src="{{ asset('frontend-assets/images/box-image-03-120x120.png') }}" alt="" width="120" height="60"/>
                                </figure>
                            </div>
                            <div class="col-4">
                                <figure class="box-image"><img src="{{ asset('frontend-assets/images/box-image-04-120x120.png') }}" alt="" width="120" height="60"/>
                                </figure>
                            </div>
                            <div class="col-4">
                                <figure class="box-image"><img src="{{ asset('frontend-assets/images/box-image-05-120x120.png') }}" alt="" width="120" height="60"/>
                                </figure>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-4">
                        <div class="box-primary novi-bg">
                            <h3 class="box-primary-content">Place for <span class="d-block font-weight-bold">your</span> picture</h3>
                        </div>
                    </div>
                    <div class="col-lg-2 col-4">
                        <figure class="box-image"><img src="{{ asset('frontend-assets/images/box-image-06-270x270.png') }}" alt="" width="270" height="135"/>
                        </figure>
                    </div>
                    <div class="col-lg-1 col-2 order-1 order-lg-0">
                        <div class="row row-sm-30 row-15 row-eight row-xs-horizontal-15">
                            <div class="col-8">
                                <figure class="box-image"><img src="{{ asset('frontend-assets/images/box-image-07-120x120.png') }}" alt="" width="120" height="60"/>
                                </figure>
                            </div>
                            <div class="col-8">
                                <figure class="box-image"><img src="{{ asset('frontend-assets/images/box-image-08-120x120.png') }}" alt="" width="120" height="60"/>
                                </figure>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-4">
                        <figure class="box-image"><img src="{{ asset('frontend-assets/images/box-image-09-270x270.png') }}" alt="" width="270" height="135"/>
                        </figure>
                    </div>
                    <div class="col-lg-2 col-4">
                        <figure class="box-image"><img src="{{ asset('frontend-assets/images/box-image-10-270x270.png') }}" alt="" width="270" height="135"/>
                        </figure>
                    </div>
                    <div class="col-lg-1 col-2">
                        <div class="row row-sm-30 row-15 row-eight row-xs-horizontal-15">
                            <div class="col-8">
                                <figure class="box-image"><img src="{{ asset('frontend-assets/images/box-image-11-120x120.png') }}" alt="" width="120" height="60"/>
                                </figure>
                            </div>
                            <div class="col-8">
                                <figure class="box-image"><img src="{{ asset('frontend-assets/images/box-image-12-120x120.png') }}" alt="" width="120" height="60"/>
                                </figure>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-4">
                        <figure class="box-image"><img src="{{ asset('frontend-assets/images/box-image-13-270x270.png') }}" alt="" width="270" height="135"/>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About As-->
    <section class="section novi-bg novi-bg-img section-lg">
        <div class="container">
            <div class="row row-50">
                <div class="col-lg-6">
                    <h2 class="text-center text-sm-left">About <span class="h2-style">Us</span></h2>
                    <div class="row row-30">
                        <div class="col-12">
                            <!-- Box Moder-->
                            <div class="box-modern">
                                <div class="box-modern-header">
                                    <div class="box-modern-icon icon novi-icon novi-bg linearicons-laptop-phone"></div>
                                    <h5 class="box-modern-title" style="width: 240px">Quality products for the best customers</h5>
                                </div>
                                <p class="box-modern-body">Online Auction features a wide variety of quality products at wholesale prices with our main locations in San Francisco, CA and Phoenix, AZ. We strive to make sure our customers are completely satisfied with their purchase.</p>
                            </div>
                        </div>
                        <div class="col-12">
                            <!-- Box Moder-->
                            <div class="box-modern">
                                <div class="box-modern-header">
                                    <div class="box-modern-icon icon novi-icon novi-bg linearicons-thumbs-up"></div>
                                    <h5 class="box-modern-title" style="width: 240px">More than 20 years of auction experience</h5>
                                </div>
                                <p class="box-modern-body">We have the knowledge and ability to handle any type of auction. We handle small local sales, and large multiple-day, multi-million dollar auctions. Our services are tailored to fit each client's needs.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h2 class="text-center text-sm-left">Events</h2>
                    <div class="row row-30 box-modern-index">
                        <div class="col-12">
                            <div class="box-modern">
                                <div class="box-modern-header">
                                    <div class="box-modern-index-count"></div>
                                    <h5 class="box-modern-title" style="width: 240px">Laptops, Smartphones & IT Equipment Auction</h5>
                                </div>
                                <p class="box-modern-body">Next Saturday, we will be conducting our online auction of IT equipment including smartphones, laptops "Dell", "Apple" and "HP", monitors, printers, servers, network components, switches, and various accessories.</p>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="box-modern">
                                <div class="box-modern-header">
                                    <div class="box-modern-index-count"></div>
                                    <h5 class="box-modern-title" style="width: 240px">Children’s Clothes & Shoes Auction</h5>
                                </div>
                                <p class="box-modern-body">If you are looking for a new outfit for our kids, then our upcoming event is for you! Our new auction of kids’ clothes and shoes will start next Sunday at 11:00 (PDT) featuring exclusive clothing collections from widely known brands.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
