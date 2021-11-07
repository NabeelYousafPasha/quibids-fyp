<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auction\AuctionRequest;
use App\Models\Auction;
use Illuminate\Http\Request;

class AuctionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $auctions = Auction::all();

        return view('backend.pages.auction.index')->with([
            'auctions' => $auctions,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.auction.form')->with([
            'form' => [
                'route' => route('auctions.store'),
            ],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AuctionRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AuctionRequest $request)
    {
        Auction::create($request->validated() + [
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('auctions.index')
            ->with('status', 'Auction created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Auction  $auction
     * @return \Illuminate\Http\Response
     */
    public function show(Auction $auction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Auction  $auction
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Auction $auction)
    {
        return view('backend.pages.auction.form')->with([
            'auction' => $auction,
            'form' => [
                'route' => route('auctions.update', ['auction' => $auction,]),
                '_method' => 'PATCH',
            ],
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Auction  $auction
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AuctionRequest $request, Auction $auction)
    {
        $auction->update($request->validated());

        return redirect()->route('auctions.index')
            ->with('status', 'Auction updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Auction  $auction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Auction $auction)
    {
        //
    }
}
