<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use App\Models\UserBidding;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserBiddingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();

        if ($user->cannot('view_bidding')){
            return $this->permissionDenied($this->fallbackRoute);
        }

        $biddings = $user->userBidding()->with('auction')->get();

        return view('backend.pages.bidding.index')->with([
            'biddings' => $biddings,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $auctions = Auction::OfPublished()
                        ->NotExpired()
                        ->pluck('id');

        $data = $request->validate([
            'auction_id' => ['required', Rule::in($auctions)],
            'offered_price' => ['required', 'integer']
        ]);

        UserBidding::create([
            'user_id' => auth()->user()->id,
            'auction_id' => $data['auction_id'],
            'offered_price' => $data['offered_price']
        ]);

        return redirect()->route('/')
            ->with('status', 'User bidded successfully.');
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
