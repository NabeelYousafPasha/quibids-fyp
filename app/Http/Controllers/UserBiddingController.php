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
        //
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
        $auctions = Auction::addSelect('*')
                    ->OfPublished()
                    ->NotExpired()
                    ->with('media')
                    ->get();
                    
        $data = $request->validate([
            'auction_id' => ['required'],
            'offered_price' => ['required', 'integer']
        ]);

        UserBidding::create([
            'user_id' => auth()->user()->id,
            'auction_id' => $data['auction_id'],
            'offered_price' => $data['offered_price']
        ]);

        return redirect()->route('/')
            ->with('status', 'User bidded created successfully.');
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