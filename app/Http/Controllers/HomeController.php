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

    public function dashboard(Request $request)
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

        if($request->filled('from'))
        {

            $publishedAuctions = $publishedAuctions->whereDate('created_at', '<=', $request->from)->get();
            $draftAuctions = $draftAuctions->whereDate('created_at', '<=', $request->from)->get();
            $openAuctions = $openAuctions->whereDate('created_at', '<=', $request->from)->get();
            $closedAuctions = $closedAuctions->whereDate('created_at', '<=', $request->from)->get();
            $pendingVendors = $pendingVendors->whereDate('created_at', '<=', $request->from)->get();
            $approvedVendors = $approvedVendors->whereDate('created_at', '<=', $request->from)->get();
            $pendingUsers = $pendingUsers->whereDate('created_at', '<=', $request->from)->get();
            $approvedUsers = $approvedUsers->whereDate('created_at', '<=', $request->from)->get();

        }

        if($request->filled('to'))
        {

            $publishedAuctions = $publishedAuctions->whereDate('created_at', '<=', $request->to)->get();
            $draftAuctions = $draftAuctions->whereDate('created_at', '<=', $request->to)->get();
            $openAuctions = $openAuctions->whereDate('created_at', '<=', $request->to)->get();
            $closedAuctions = $closedAuctions->whereDate('created_at', '<=', $request->to)->get();
            $pendingVendors = $pendingVendors->whereDate('created_at', '<=', $request->to)->get();
            $approvedVendors = $approvedVendors->whereDate('created_at', '<=', $request->to)->get();
            $pendingUsers = $pendingUsers->whereDate('created_at', '<=', $request->to)->get();
            $approvedUsers = $approvedUsers->whereDate('created_at', '<=', $request->to)->get();
            
        }

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
