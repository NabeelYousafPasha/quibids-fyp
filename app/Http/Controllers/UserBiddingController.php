<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserBidding\UserBiddingRequest;
use App\Models\Role;
use App\Models\UserBidding;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserBiddingRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserBiddingRequest $request)
    {
        if (auth()->user()->cannot('create_bidding')) {
            return $this->permissionDenied($this->fallbackRoute);
        }

        UserBidding::create($request->validated() + [
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('/')
            ->with('status', 'User has bid successfully.');
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
