<?php

namespace App\Http\Controllers;

use App\Http\Requests\Package\PackageRequest;
use App\Models\AuctionCategory;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        if (auth()->user()->cannot('view_package'))
            return $this->permissionDenied($this->fallbackRoute);

        $packages = Package::all();

        return view('backend.pages.package.index')->with([
            'packages' => $packages,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function create()
    {
        if (auth()->user()->cannot('create_package'))
            return $this->permissionDenied($this->fallbackRoute);

        return view('backend.pages.package.form')->with([
            'form' => [
                'route' => route('dashboard.packages.store'),
            ],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PackageRequest $request)
    {
        if (auth()->user()->cannot('create_package'))
            return $this->permissionDenied($this->fallbackRoute);

        Package::create($request->validated() + [
            'created_by' => auth()->id(),
        ]);

        return redirect()->route('dashboard.packages.index')
            ->with('status', 'Package created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function show(Package $package)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function edit(Package $package)
    {
        if (auth()->user()->cannot('update_package'))
            return $this->permissionDenied($this->fallbackRoute);

        return view('backend.pages.package.form')->with([
            'form' => [
                'route' => route('dashboard.packages.update', ['package' => $package]),
                '_method' => 'PATCH',
            ],
            'package' => $package,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PackageRequest $request
     * @param \App\Models\Package $package
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PackageRequest $request, Package $package)
    {
        if (auth()->user()->cannot('update_package'))
            return $this->permissionDenied($this->fallbackRoute);

        $package->update($request->validated());

        return redirect()->route('dashboard.packages.index')
            ->with('status', 'Package updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Package $package)
    {
        if (auth()->user()->cannot('delete_package'))
            return $this->permissionDenied($this->fallbackRoute);

        $package->delete();

        return redirect()->route('dashboard.packages.index')
            ->with('status', 'Package deleted successfully.');
    }
}
