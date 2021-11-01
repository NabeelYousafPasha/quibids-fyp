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
        Role::where('name', '=', Role::ADMIN)
            ->first()
            ->givePermissionTo(Permission::all());
    }
}
