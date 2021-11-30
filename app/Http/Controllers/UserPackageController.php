<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\UserPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Package $package)
    {
        $user = auth()->user();

        DB::transaction(function() use ($package, $user){            
            $user->userPackages()->create([
                'package_id' => $package->id,
                'awarded_bids' => $package->award_bids,
                'price' => $package->price
            ]);

            $user->update([
                'bids_left' => $package->award_bids + $user->bids_left
            ]);
        });

        return redirect()->route('dashboard.packages.index')
        ->with('status', 'Package purchased successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserPackage  $userPackage
     * @return \Illuminate\Http\Response
     */
    public function show(UserPackage $userPackage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserPackage  $userPackage
     * @return \Illuminate\Http\Response
     */
    public function edit(UserPackage $userPackage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserPackage  $userPackage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserPackage $userPackage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserPackage  $userPackage
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserPackage $userPackage)
    {
        //
    }
}
