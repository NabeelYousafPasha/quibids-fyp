<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auction\AuctionRequest;
use App\Mail\AuctionPublished;
use App\Models\{
    Auction,
    AuctionCategory,
    Category,
    Role
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AuctionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->cannot('view_auction'))
            return $this->permissionDenied($this->fallbackRoute);

        $auctions = Auction::query();

        if (! auth()->user()->hasRole(Role::ADMIN)) {
            // belongs to auth user
            $auctions = $auctions->where('user_id', '=', auth()->id());
        }

        return view('backend.pages.auction.index')->with([
            'auctions' => $auctions->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->cannot('create_auction'))
            return $this->permissionDenied($this->fallbackRoute);

        $categories = Category::pluck('name', 'id');

        return view('backend.pages.auction.form')->with([
            'form' => [
                'route' => route('dashboard.auctions.store'),
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
        if (auth()->user()->cannot('create_auction'))
            return $this->permissionDenied($this->fallbackRoute);

        $auction = Auction::create($request->validated() + [
            'user_id' => auth()->id(),
        ]);

        foreach ($request->input('categories') as $categoryId) {
            AuctionCategory::create([
                'auction_id' => $auction->id,
                'category_id' => $categoryId,
            ]);
        }

        return redirect()->route('dashboard.auctions.index')
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
        return view('backend.pages.auction.detail-page')->with([
            'auction' => $auction,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Auction  $auction
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Auction $auction)
    {
        if (auth()->user()->cannot('update_auction'))
            return $this->permissionDenied($this->fallbackRoute);

        $categories = Category::pluck('name', 'id');

        $auctionCategories = AuctionCategory::where('auction_id', '=', $auction->id)->pluck('id');

        return view('backend.pages.auction.form')->with([
            'auction' => $auction,
            'form' => [
                'route' => route('dashboard.auctions.update', ['auction' => $auction,]),
                '_method' => 'PATCH',
            ],
            'categories' => $categories,
            'auctionCategories' => $auctionCategories,
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
        if (auth()->user()->cannot('update_auction'))
            return $this->permissionDenied($this->fallbackRoute);

        $auction->update($request->validated());

        // replace old
        AuctionCategory::where('auction_id', '=', $auction->id)->delete();

        // re-insert updated
        foreach ($request->input('categories') as $categoryId) {
            AuctionCategory::create([
                'auction_id' => $auction->id,
                'category_id' => $categoryId,
            ]);
        }

        return redirect()->route('dashboard.auctions.index')
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
        if (auth()->user()->cannot('delete_auction'))
            return $this->permissionDenied($this->fallbackRoute);
    }

    public function listMedia(Auction $auction)
    {
        if (auth()->user()->cannot('create_auction'))
            return $this->permissionDenied($this->fallbackRoute);

        $auctionMediaItems = $auction->getMedia('auction');

        return view('backend.pages.auction.media')->with([
            'auction' => $auction,
            'auctionMediaItems' => $auctionMediaItems,
        ]);
    }

    public function uploadMedia(Request $request, Auction $auction)
    {
        if (auth()->user()->cannot('create_auction'))
            return $this->permissionDenied($this->fallbackRoute);

        $this->validate($request, [
            'media' => ['required', 'file', 'image',],
        ]);

        $auction->addMediaFromRequest('media')->toMediaCollection('auction');

        return redirect()->route('dashboard.auctions.media', ['auction' => $auction])
            ->with('status', 'Image uploaded');
    }

    public function toggleStatus(Auction $auction)
    {
        if ($auction->is_published == 0) {

            $auction->is_published = 1;

            Mail::to($auction->createdBy)->send(new AuctionPublished());
        } else {
            $auction->is_published = 0;
        }

        $auctionPublished = $auction->save();

        if ($auctionPublished) {
            ($auction->is_published)
                ? session()->flash('status', 'Auction Published successfully')
                : session()->flash('status', 'Auction marked Draft successfully');
        }

        return redirect()->route('dashboard.auctions.index');
    }
}
