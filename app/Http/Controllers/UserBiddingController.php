<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserBidding\UserBiddingRequest;
use App\Models\Auction;
use App\Models\Role;
use App\Models\UserBidding;
use Carbon\Carbon;
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
    public function index(Request $request)
    {
        if (auth()->user()->cannot('view_bidding')) {
            return $this->permissionDenied($this->fallbackRoute);
        }

        $alreadyMarkedWon = false;

        // bidder
        if (auth()->user()->hasRole(Role::USER)) {
            // belongs to auth user

            $biddings = auth()->user()->biddings()
                        ->whereNull('won_at')
                        ->get();

            $wonBiddings = auth()->user()->biddings()
                        ->whereNotNull('won_at')
                        ->get();

        } else {
            $biddings = UserBidding::where('auction_id', '=', $request->get('auction'))
                        ->with('user')
                        ->whereNull('won_at')
                        ->get();

            $wonBiddings = UserBidding::where('auction_id', '=', $request->get('auction'))
                        ->with('user')
                        ->whereNotNull('won_at')
                        ->get();

            if (count($wonBiddings->toArray()) > 0) {
                $alreadyMarkedWon = true;
            }
        }

        return view('backend.pages.bidding.index')->with([
            'biddings' => $biddings ?? [],
            'wonBiddings' => $wonBiddings ?? [],
            'alreadyMarkedWon' => $alreadyMarkedWon ?? false,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function create(Auction $auction)
    {
        if (auth()->user()->cannot('create_bidding') && auth()->user()->cannot('bid_auction')) {
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
        if (auth()->user()->cannot('create_bidding') && auth()->user()->cannot('bid_auction')) {
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

        try {
            DB::transaction(function() use ($request, $auction){
                UserBidding::create($request->validated() + [
                    'auction_id' => $auction->id,
                    'user_id' => auth()->id(),
                ]);

                $auction->update([
                    'estimated_expire_at' => Carbon::parse($auction->estimated_expire_at)
                                                    ->addSeconds(env('INCREMENT_AFTER_BIDDING'))
                ]);
            });
        } catch (\Throwable $th) {
            return redirect()->route('dashboard.bidding.index')
            ->with($th->getMessage());
        }

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
