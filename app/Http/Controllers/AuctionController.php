<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auction\AuctionRequest;
use App\Models\{
    Auction,
    AuctionCategory,
    Category
};
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
        $categories = Category::pluck('name', 'id');

        return view('backend.pages.auction.form')->with([
            'form' => [
                'route' => route('auctions.store'),
            ],
            'categories' => $categories,
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
        $auction = Auction::create($request->validated() + [
            'user_id' => auth()->id(),
        ]);

        foreach ($request->input('categories') as $categoryId) {
            AuctionCategory::create([
                'auction_id' => $auction->id,
                'category_id' => $categoryId,
            ]);
        }

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
        $categories = Category::pluck('name', 'id');

        return view('backend.pages.auction.form')->with([
            'auction' => $auction,
            'form' => [
                'route' => route('auctions.update', ['auction' => $auction,]),
                '_method' => 'PATCH',
            ],
            'categories' => $categories,
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

        // remoce old
        AuctionCategory::where('auction_id', '=', $auction->id)->delete();

        // re-insert updated
        foreach ($request->input('categories') as $categoryId) {
            AuctionCategory::create([
                'auction_id' => $auction->id,
                'category_id' => $categoryId,
            ]);
        }

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

    public function listMedia(Auction $auction)
    {
        $auctionMediaItems = $auction->getMedia('auction');

        return view('backend.pages.auction.media')->with([
            'auction' => $auction,
            'auctionMediaItems' => $auctionMediaItems,
        ]);
    }

    public function uploadMedia(Request $request, Auction $auction)
    {
        $this->validate($request, [
            'media' => ['required', 'file', 'image',],
        ]);

        $auction->addMediaFromRequest('media')->toMediaCollection('auction');

        return redirect()->route('auctions.media', ['auction' => $auction])
            ->with('status', 'Image uploaded');
    }
}
