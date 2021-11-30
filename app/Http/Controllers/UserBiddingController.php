<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserBidding\UserBiddingRequest;
use App\Models\Auction;
use App\Models\Role;
use App\Models\UserBidding;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserBiddingController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        if (auth()->user()->cannot('view_bidding')) {
            return $this->permissionDenied($this->fallbackRoute);
        }

        $biddings = UserBidding::with('auction');
        $wonBiddings = null;

        if (! auth()->user()->hasRole(Role::ADMIN)) {

            // belongs to auth user
            $biddings = $biddings->where('user_id', '=', auth()->id());
            $wonBiddings = $biddings->where('user_id', '=', auth()->id())
                                    ->whereNotNull('won_at')->get();
        }

        return view('backend.pages.bidding.index')->with([
            'biddings' => $biddings->get(),
            'wonBiddings' => $wonBiddings,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function create(Auction $auction)
    {
        if (auth()->user()->cannot('create_bidding')) {
            return $this->permissionDenied($this->fallbackRoute);
        }

        $validAuction = Auction::OfPublished()
            ->NotExpired()
            ->where('id', '=', $auction->id)
            ->first();

        if (is_null($validAuction)) {
            return redirect()->route('dashboard.bidding.index')
                ->with([
                    'status' => 'Invalid Auction.',
                    'error_status' => true,
                ]);
        }

        if (! is_null(UserBidding::where([
            'auction_id' => $auction->id,
            'user_id' => auth()->id(),
        ])->first())) {
            return redirect()->route('dashboard.bidding.index')
                ->with([
                    'status' => 'You have already bid.',
                    'error_status' => true,
                ]);
        }

        $maxOfferedBiddingPrice = UserBidding::select(DB::raw("MAX(offered_price) as max_offered_price"))
            ->where('auction_id', '=', $auction->id)
            ->first();

        $price = $auction->estimated_price;
        if (($maxOfferedBiddingPrice->max_offered_price ?? 0) > $auction->estimated_price) {
            $price = $maxOfferedBiddingPrice->max_offered_price ?? 0;
        }

        $maxOfferedBiddingPrice = $price;

        return view('backend.pages.bidding.form')->with([
            'auction' => $auction,
            'maxOfferedBiddingPrice' => $maxOfferedBiddingPrice,
            'form' => [
                'route' => route('dashboard.bidding.store', ['auction' => $auction,]),
            ],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserBiddingRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserBiddingRequest $request, Auction $auction)
    {
        if (auth()->user()->cannot('create_bidding')) {
            return $this->permissionDenied($this->fallbackRoute);
        }

        if (! is_null(UserBidding::where([
            'auction_id' => $auction->id,
            'user_id' => auth()->id(),
        ])->first())) {
            return redirect()->route('dashboard.bidding.index')
                ->with([
                    'status' => 'You have already bid.',
                    'error_status' => true,
                ]);
        }

        $validAuction = Auction::OfPublished()
            ->NotExpired()
            ->where('id', '=', $auction->id)
            ->first();

        if (is_null($validAuction)) {
            return redirect()->route('dashboard.bidding.create', ['auction' => $auction])
                ->with([
                    'status' => 'Invalid Auction.',
                    'error_status' => true,
                ]);
        }

        UserBidding::create($request->validated() + [
            'auction_id' => $auction->id,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('dashboard.bidding.index')
            ->with('status', 'Your bid has been submitted successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserBidding  $userBidding
     * @return \Illuminate\Http\Response
     */
    public function show(UserBidding $userBidding)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserBidding  $userBidding
     * @return \Illuminate\Http\Response
     */
    public function edit(UserBidding $userBidding)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserBidding  $userBidding
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserBidding $userBidding)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserBidding  $userBidding
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserBidding $userBidding)
    {
        //
    }
}
