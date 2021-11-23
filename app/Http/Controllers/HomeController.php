<?php

namespace App\Http\Controllers;

use App\Models\{
    Package,
    Auction,
    User
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    public function index()
    {
        $packages = Package::all();

        $publishedAuctions = Auction::addSelect('*')
            ->expiryTimeInSeconds()
            ->OfPublished()
            ->NotExpired()
            ->limit(4)
            ->with('media');

        return view('frontend.index', [
            'packages' => $packages,
            'publishedAuctions' => $publishedAuctions->get(),
        ]);
    }

    public function dashboard()
    {
        $user = Auth::user();

        $publishedAuctions = Auction::OfPublished();
        $draftAuctions = Auction::OfDraft();
        $openAuctions = Auction::NotExpired();
        $closedAuctions = Auction::Expired();
        $pendingVendors = User::OfRoleVendor()
                                ->Unapproved();
        $approvedVendors = User::OfRoleVendor()
                                ->Approved();
        $pendingUsers = User::OfRoleUser()
                                ->Unapproved();
        $approvedUsers = User::OfRoleUser()
                                ->Approved();

        $items = [];
        $items['Published Auctions'] = $publishedAuctions->count();
        $items['Draft Auctions'] = $draftAuctions->count();
        $items['Open Auctions'] = $openAuctions->count();
        $items['Closed Auctions'] = $closedAuctions->count();
        $items['Pending Vendors'] = $pendingVendors->count();
        $items['Approved Vendors'] = $approvedVendors->count();
        $items['Pending Users'] = $pendingUsers->count();
        $items['Approved Users'] = $approvedUsers->count();

        return view('dashboard')->with([
            'authUser' => $user,
            'items' => $items,
        ]);
    }
}
