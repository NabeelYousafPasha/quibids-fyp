<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function vendors()
    {
        $unApprovedVendors = User::OfRoleVendor()->unapproved();
        $approvedVendors = User::OfRoleVendor()->approved();

        return view('backend.pages.vendor.index')->with([
            'unApprovedVendors' => $unApprovedVendors->get(),
            'approvedVendors' => $approvedVendors->get(),
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function users()
    {
        $unApprovedUsers = User::OfRoleUser()->unapproved();
        $approvedUsers = User::OfRoleUser()->approved();

        return view('backend.pages.user.index')->with([
            'unApprovedUsers' => $unApprovedUsers->get(),
            'approvedUsers' => $approvedUsers->get(),
        ]);
    }

    /**
     * @param Request $request
     * @param $role
     * @param User $person
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function toggleStatus(Request $request, $role, User $person)
    {
        if (! in_array($role, [Role::VENDOR, Role::USER])) {
            return redirect()->route('dashboard.'.$role.'s')
                ->with('status', 'Switch Not Possible');
        }

        $person->approved_at = ! is_null($person->approved_at) ? NULL : now();
        $person->save();

        return redirect()->route('dashboard.'.$role.'s')
            ->with('status', 'Status switched successfully');
    }
}
