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
        $publishedAuctions = Auction::addSelect('*')
                                ->OfPublished();
        $draftAuctions = Auction::addSelect('*')
                                ->OfDraft();
        $openAuctions = Auction::addSelect('*')
                                ->NotExpired();
        $closedAuctions = Auction::addSelect('*')
                                ->Expired();

        $pendingVendors = User::addSelect('*')
                                ->OfRoleVendor()
                                ->Approved();

        $approvedVendors = User::addSelect('*')
                                ->OfRoleVendor()
                                ->Unapproved();

        $pendingUsers = User::addSelect('*')
                                ->OfRoleUser()
                                ->Approved();

        $approvedUsers = User::addSelect('*')
                                ->OfRoleUser()
                                ->Unapproved();

        $items = [];
        $items['Published Auctions'] = count($publishedAuctions->get());
        $items['Draft Auctions'] = count($draftAuctions->get());
        $items['Open Auctions'] = count($publishedAuctions->get());
        $items['Closed Auctions'] = count($publishedAuctions->get());
        $items['Pending Vendors'] = count($publishedAuctions->get());
        $items['Approved Vendors'] = count($publishedAuctions->get());
        $items['Pending Users'] = count($publishedAuctions->get());
        $items['Approved Users'] = count($publishedAuctions->get());

        return view('dashboard')->with([
            'authUser' => $user,
            'items' => $items,
        ]);
    }
}
