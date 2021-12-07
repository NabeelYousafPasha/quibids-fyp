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

        $operations = [
            'purchase_package',
            'bid_auction',
            'message_vendor',
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
