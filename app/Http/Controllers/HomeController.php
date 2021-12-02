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

        return view('frontend.index', [
            'packages' => $packages,
        ]);
    }

    public function dashboard()
    {
        $user = Auth::user();

        $publishedAuctions = Auction::OfPublished();
        $draftAuctions = Auction::OfDraft();
        $openAuctions = Auction::NotExpired();
        $closedAuctions = Auction::Expired();
        $pendingVendors = User::OfRoleVendor()->Unapproved();
        $approvedVendors = User::OfRoleVendor()->Approved();
        $pendingUsers = User::OfRoleUser()->Unapproved();
        $approvedUsers = User::OfRoleUser()->Approved();

        $stats = [];
        $stats['Auctions']['Published Auctions'] = $publishedAuctions->count();
        $stats['Auctions']['Draft Auctions'] = $draftAuctions->count();
        $stats['Auctions']['Open Auctions'] = $openAuctions->count();
        $stats['Auctions']['Closed Auctions'] = $closedAuctions->count();

        $stats['Vendors']['Pending Vendors'] = $pendingVendors->count();
        $stats['Vendors']['Approved Vendors'] = $approvedVendors->count();

        $stats['Users']['Pending Users'] = $pendingUsers->count();
        $stats['Users']['Approved Users'] = $approvedUsers->count();

        return view('dashboard')->with([
            'authUser' => $user,
            'stats' => $stats,
        ]);
    }
}
