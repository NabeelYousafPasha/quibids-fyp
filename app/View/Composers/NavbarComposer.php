<?php

namespace App\View\Composers;


use App\Models\Auction;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NavbarComposer
{

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $unapprovedVendorCount = User::OfRoleVendor()->unapproved();
        $unapprovedUserCount = User::OfRoleUser()->unapproved();
        $draftAuctionCount = Auction::OfDraft()->whereNull('sold_at');

        $view->with([
            'navbarStatistics' => [
                'unapprovedVendorCount' => $unapprovedVendorCount->count(),
                'unapprovedUserCount' => $unapprovedUserCount->count(),
                'draftAuctionCount' => $draftAuctionCount->count(),
            ],
        ]);
    }

}
