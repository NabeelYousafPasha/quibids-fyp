<div wire:poll>
    <section class="section novi-bg novi-bg-img section-lg bg-white section-top-shadow">
        <div class="container">
            <h2 class="text-center text-sm-left">Current <span class="h2-style">Auctions</span></h2>            
            <div class="row row-50 mt-50">
                @forelse ($allPublishedAuctions ?? [] as $key => $auction)
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="post-modern">
                            <div class="post-modern-countdown countdown" data-format="HMS" data-until="{{ $auction->left_expiry_time }}"></div>
                            <figure class="post-modern-figure">
                                <img
                                    src="{{ $auction->media()->latest()->first() ? $auction->media()->latest()->first()->getUrl() : asset('frontend-assets/images/no-img.png') }}"
                                    alt=""
                                />
                            </figure>
                            <div class="post-modern-caption">
                                <div class="post-modern-price">Price: ${{ $auction->estimated_price }}</div>
                                {{-- <div class="post-modern-price-value">0</div> --}}
                                <h5 class="post-modern-link">
                                    <a
                                        href="javascript:void(0)"
                                    >
                                        {{ $auction->title }}
                                    </a>
                                </h5>
    
                                <a
                                    href="{{ route('dashboard.bidding.create', ['auction' => $auction]) }}"
                                    class="button button-box-right button-primary"
                                >
                                    Submit a bid
                                    <span class="button-box">
                                        <span class="button-box-text">X</span>
                                        <span class="button-box-count">1</span>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="post-modern">
                            <div class="post-modern-countdown countdown" data-format="HMS" data-until="+0"></div>
                            <figure class="post-modern-figure">
                                <img src="{{ asset('frontend-assets/images/no-img.png') }}" alt="" width="270" height="108"/>
                            </figure>
                            <div class="post-modern-caption">
                                <div class="post-modern-price">Price: $0</div>
                                <div class="post-modern-price-value">0</div>
                                <h5 class="post-modern-link">
                                    <a
                                        href="javascript:void(0)"
                                    >
                                        No Active Auction(s)
                                    </a>
                                </h5>
                                <a
                                    class="button button-box-right button-primary"
                                    href="javascript:void(0)"
                                >
                                    Submit a bid
                                    <div class="button-box">
                                        <div class="button-box-text">X</div>
                                        <div class="button-box-count">0</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="post-modern">
                            <div class="post-modern-countdown countdown" data-format="HMS" data-until="+0"></div>
                            <figure class="post-modern-figure">
                                <img src="{{ asset('frontend-assets/images/no-img.png') }}" alt="" width="270" height="108"/>
                            </figure>
                            <div class="post-modern-caption">
                                <div class="post-modern-price">Price: $0</div>
                                <div class="post-modern-price-value">0</div>
                                <h5 class="post-modern-link">
                                    <a
                                        href="javascript:void(0)"
                                    >
                                        No Active Auction(s)
                                    </a>
                                </h5>
    
                                <a
                                    class="button button-box-right button-primary"
                                    href="javascript:void(0)"
                                >
                                    Submit a bid
                                    <div class="button-box">
                                        <div class="button-box-text">X</div>
                                        <div class="button-box-count">0</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="post-modern">
                            <div class="post-modern-countdown countdown" data-format="HMS" data-until="+0"></div>
                            <figure class="post-modern-figure">
                                <img src="{{ asset('frontend-assets/images/no-img.png') }}" alt="" width="270" height="108"/>
                            </figure>
                            <div class="post-modern-caption">
                                <div class="post-modern-price">Price: $0</div>
                                <div class="post-modern-price-value">0</div>
                                <h5 class="post-modern-link">
                                    <a
                                        href="javascript:void(0)"
                                    >
                                        No Active Auction(s)
                                    </a>
                                </h5>
                                <a
                                    class="button button-box-right button-primary"
                                    href="javascript:void(0)"
                                >
                                    Submit a bid
                                    <div class="button-box">
                                        <div class="button-box-text">X</div>
                                        <div class="button-box-count">0</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="post-modern">
                            <div class="post-modern-countdown countdown" data-format="HMS" data-until="+0"></div>
                            <figure class="post-modern-figure">
                                <img src="{{ asset('frontend-assets/images/no-img.png') }}" alt="" width="270" height="108"/>
                            </figure>
                            <div class="post-modern-caption">
                                <div class="post-modern-price">Price: $0</div>
                                <div class="post-modern-price-value">0</div>
                                <h5 class="post-modern-link">
                                    <a
                                        href="javascript:void(0)"
                                    >
                                        No Active Auction(s)
                                    </a>
                                </h5>
                                <a
                                    class="button button-box-right button-primary"
                                    href="javascript:void(0)"
                                >
                                    Submit a bid
                                    <div class="button-box">
                                        <div class="button-box-text">X</div>
                                        <div class="button-box-count">0</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>                    
                    @endforelse
                </div>
            </div> 
            <div class="flex justify-center my-8">
                {{ $allPublishedAuctions->links() }}                
            </div>           
        </section>        
</div>
