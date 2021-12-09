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

        $operations = Permission::getActions();

        $entities = [
            'auction',
        ];

        $permission_iterations = [];
        foreach ($entities as $entity_key => $entity) {
            foreach ($operations as $operation_key => $operation) {
                $permission_iterations[$entity_key][$operation_key]['name'] = $operation.'_'.$entity;
                $permission_iterations[$entity_key][$operation_key]['guard_name'] = 'web';
            }
        }

        foreach ($permission_iterations as $permissions) {
            foreach ($permissions as $permission) {
                $vendorPermission = Permission::firstOrCreate($permission);

                $vendor->givePermissionTo($vendorPermission);
            }
        }


        $operations = [
            'message',
            'view_bidding',
            'view_auction_bids',
            'mark_winner',
        ];

        foreach ($operations as $operation) {
            $vendorPermission = Permission::firstOrCreate([
                'name' => $operation,
                'guard_name' => 'web',
            ]);

            $vendor->givePermissionTo($vendorPermission);
        }
    }
}
