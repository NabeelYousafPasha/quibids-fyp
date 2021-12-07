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

        $this->validate($request, [
            'from' => ['nullable', 'date'],
            'to' => ['nullable', 'date', 'after:from'],
        ]);

        $from = $request->get('from');
        $to = $request->get('to');

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

        if ($request->filled('from')) {
            $publishedAuctions = $publishedAuctions->whereDate('created_at', '>=', $from);
            $draftAuctions = $draftAuctions->whereDate('created_at', '>=', $from);
            $openAuctions = $openAuctions->whereDate('created_at', '>=', $from);
            $closedAuctions = $closedAuctions->whereDate('created_at', '>=', $from);
            $pendingVendors = $pendingVendors->whereDate('created_at', '>=', $from);
            $approvedVendors = $approvedVendors->whereDate('created_at', '>=', $from);
            $pendingUsers = $pendingUsers->whereDate('created_at', '>=', $from);
            $approvedUsers = $approvedUsers->whereDate('created_at', '>=', $from);
        }

        if ($request->filled('to')) {
            $publishedAuctions = $publishedAuctions->whereDate('created_at', '<=', $to);
            $draftAuctions = $draftAuctions->whereDate('created_at', '<=', $to);
            $openAuctions = $openAuctions->whereDate('created_at', '<=', $to);
            $closedAuctions = $closedAuctions->whereDate('created_at', '<=', $to);
            $pendingVendors = $pendingVendors->whereDate('created_at', '<=', $to);
            $approvedVendors = $approvedVendors->whereDate('created_at', '<=', $to);
            $pendingUsers = $pendingUsers->whereDate('created_at', '<=', $to);
            $approvedUsers = $approvedUsers->whereDate('created_at', '<=', $to);
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
            'filters' => [
                'from' => $from,
                'to' => $to,
            ],
        ]);
    }
}
