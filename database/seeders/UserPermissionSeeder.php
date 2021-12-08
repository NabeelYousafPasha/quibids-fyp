<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class UserPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = Role::where('name', '=', Role::USER)->first();

        $operations = Permission::getActions();

        $entities = [
            'bidding',
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
                $userPermission = Permission::firstOrCreate($permission);

                $user->givePermissionTo($userPermission);
            }
        }

        $operations = [
            'purchase_package',
            'bid_auction',
            'message',
            'start_chat',
            Permission::VIEW.'_auction',
            Permission::VIEW.'_package',
        ];

        foreach ($operations as $operation) {
            $userPermission = Permission::firstOrCreate([
                'name' => $operation,
                'guard_name' => 'web',
            ]);

            $user->givePermissionTo($userPermission);
        }

    }
}
