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
        $packages = Package::all();
        $unApprovedVendors = User::whereNull('approved_at')->get();

        return view('frontend.pages.vendor.index')->with([
            'packages' => $packages,
            'unApprovedVendors' => $unApprovedVendors
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function users()
    {
        $packages = Package::all();
        $unApprovedUsers = User::whereNull('approved_at')->get();

        return view('frontend.pages.user.index')->with([
            'packages' => $packages,
            'unApprovedUsers' => $unApprovedUsers
        ]);
    }
}
