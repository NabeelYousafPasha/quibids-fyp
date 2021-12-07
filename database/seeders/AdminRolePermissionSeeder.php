<?php

namespace Database\Seeders;

use App\Models\{
    Role,
    Permission
};
use Illuminate\Database\Seeder;

class AdminRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::where('name', '=', Role::ADMIN)
            ->first();

        $admin->givePermissionTo(Permission::all());

        $admin->revokePermissionTo([
            'create_auction',
            'bid_auction',
            'create_bidding',
            'message',
        ]);

    }
}
