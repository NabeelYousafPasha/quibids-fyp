<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            PermissionSeeder::class,
            UserSeeder::class,
            AdminRolePermissionSeeder::class,
            MessageStatusSeeder::class,
            PackageSeeder::class,
            CategorySeeder::class,

            UserPermissionSeeder::class,
            VendorPermissionSeeder::class,
        ]);
    }
}
