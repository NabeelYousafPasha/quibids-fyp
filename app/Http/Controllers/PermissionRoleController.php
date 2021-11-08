<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\{
    Role,
    Permission
};

class PermissionRoleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->cannot('view_permission_role'))
            return $this->permissionDenied('dashboard.index');

        $roles = Role::ExceptAdmin()->orderBy('id')->pluck('name', 'id');

        $excludePermissions = [
            Permission::CREATE.'_permission_role',
            Permission::VIEW.'_permission_role',
            Permission::UPDATE.'_permission_role',
            Permission::DELETE.'_permission_role',
        ];

        $permissions = Permission::whereNotIn('name', $excludePermissions);

        $permissions = $permissions->orderBy('id')->pluck('name', 'id');

        $permissionsRoles = DB::table(config('permission.table_names.role_has_permissions'))
            ->select(DB::raw('CONCAT(permission_id, "-", role_id) AS detail'))
            ->join('permissions', function($join) use ($excludePermissions) {
                $join->on(config('permission.table_names.role_has_permissions').'.permission_id', '=', 'permissions.id')
                    ->whereNotIn('name', $excludePermissions);
            })
            ->orderBy('permissions.id', 'ASC');

        return view('backend.pages.permission_role.index')->with([
            'roles' => $roles,
            'permissions' => $permissions,
            'permissionsRoles' => $permissionsRoles->pluck('detail')->all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (auth()->user()->cannot('create_permission_role'))
            return $this->permissionDenied('dashboard.index');

        $data = [];
        $permissions_roles = ($request->input('permissions_roles')) ?: [];

        foreach($permissions_roles as $perm => $roles)
            foreach($roles as $role => $value)
                $data[] = array('permission_id' => $perm, 'role_id' => $role);

        // forgetting previous cached data
        app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();

        DB::transaction(function () use ($data) {

            DB::table(config('permission.table_names.role_has_permissions'))
                ->whereNotIn('role_id', [
                    Role::where('name', '=', Role::ADMIN)->first()->id
                ])
                ->delete();

            DB::table(config('permission.table_names.role_has_permissions'))
                ->insert($data);

        });

        return redirect()->route('dashboard.setup.permission_role.create')
            ->with('status', 'Roles Permissions updated');

    }
}
