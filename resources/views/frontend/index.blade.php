@extends('frontend.layout.app')

@section('stylesheets')
    <style>
        .post-modern-countdown {
            font-size: 17px;
        }

        .alert-success{
            background-color: lightgreen;
            color: white;
        }

        figure.post-modern-figure img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            padding: 10px;
        }
    </style>
@endsection

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
                        <a
                            href="{{ route('register') }}"
                            class="button button-icon button-icon-right button-black button-lg"
                        >
                            <span class="icon novi-icon fa fa-chevron-right"></span>
                            Register
                        </a>
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
            <h2 class="text-center text-sm-left">
                Current <span class="h2-style">Auctions</span>
            </h2>
            @livewire('current-auctions')

            <div class="mt-xl-40 mt-50 text-center text-sm-left">
                <a class="button button-icon button-icon-right button-black" href="{{ route('all.auctions') }}">
                    <span class="icon novi-icon fa fa-chevron-right"></span>
                    View all auctions
                </a>
            </div>
        </div>
    </section>

    <!-- How it Works-->
    <section class="section novi-bg novi-bg-img section-lg bg-gray-100 section-top-shadow" id="packages" >
        <div class="container">
            <h2 class="text-center text-sm-left">Packages <span class="h2-style">we offer</span></h2>
            <div class="row row-50 mt-50 column-arrow">
                @forelse($packages ?? [] as $package)
                <div class="col-lg-3 col-sm-6">
                    <!-- Box Icon Classic-->
                    <div class="box-icon-classic">
                        <div class="box-icon-classic-icon icon novi-icon linearicons-mouse-left"></div>
                        <h4 class="box-icon-classic-title">
                            {{ $package->name }}
                        </h4>
                        <h6>
                            <u>{{ $package->award_bids }}</u> Bids for just ${{ $package->price }}
                        </h6>
                        <p>
                            {{ $package->description }}
                        </p>
                        <p>To start using our auction, you’ll need to register. It’s completely free and requires just a few clicks!</p>
                    </div>
                </div>
                @empty
                    <div class="col-lg-12 col-sm-12">
                        <!-- Box Icon Classic-->
                        <div class="box-icon-classic text-center">
                            <h4 class="box-icon-classic-title">
                                Free
                                <span style="font-size: 5rem;">{{ config('constants.default_bids') }}</span>
                                Bids
                            </h4>
                            <p>To start using our auction, you’ll need to register. It’s completely free and requires just a few clicks!</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- How it Works-->
    <section class="section novi-bg novi-bg-img section-lg bg-white">
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

@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            // Add smooth scrolling to all links
            $("#nav-packages").on('click', function(event) {

                // Make sure this.hash has a value before overriding default behavior
                if (this.hash !== "") {
                    // Prevent default anchor click behavior
                    event.preventDefault();

                    // Store hash
                    var hash = this.hash;

                    // Using jQuery's animate() method to add smooth page scroll
                    // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
                    $('html, body').animate({
                        scrollTop: $(hash).offset().top
                    }, 800, function(){

                        // Add hash (#) to URL when done scrolling (default click behavior)
                        window.location.hash = hash;
                    });
                } // End if
            });
        });
    </script>
@endsection
