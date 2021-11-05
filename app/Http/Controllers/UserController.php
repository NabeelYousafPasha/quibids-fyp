<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function vendors()
    {
        $unApprovedVendors = User::OfRoleVendor()->unapproved();

        return view('frontend.pages.vendor.index')->with([
            'unApprovedVendors' => $unApprovedVendors->get()
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function users()
    {
        $unApprovedUsers = User::OfRoleUser()->unapproved();

        return view('frontend.pages.user.index')->with([
            'unApprovedUsers' => $unApprovedUsers->get()
        ]);
    }
}
