<?php

namespace App\View\Composers;


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

        $view->with([
            'navbarStatistics' => [
                'unapprovedVendorCount' => $unapprovedVendorCount->count(),
                'unapprovedUserCount' => $unapprovedUserCount->count(),
            ],
        ]);
    }

}
