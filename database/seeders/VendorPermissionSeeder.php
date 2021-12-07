<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class VendorPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vendor = Role::where('name', '=', Role::VENDOR)->first();

        $operations = [];

        foreach ($operations as $operation) {
            $vendorPermission = Permission::firstOrCreate([
                'name' => $operation,
                'guard_name' => 'web',
            ]);

            $vendor->givePermissionTo($vendorPermission);
        }
    }
}
