<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = bcrypt('qwerty123fyp');

        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@fyp.com',
                'role' => Role::ADMIN,
            ],
            [
                'name' => 'Nabeel Pasha',
                'email' => 'nabeelyousafpasha@gmail.com',
                'role' => Role::ADMIN,
            ],
            [
                'name' => 'Vendor',
                'email' => 'vendor@fyp.com',
                'role' => Role::VENDOR,
            ],
            [
                'name' => 'User',
                'email' => 'user@fyp.com',
                'role' => Role::USER,
            ],
        ];

        foreach ($users as $userToSeed) {
            $user = User::firstOrCreate([
                'email' => $userToSeed['email'],
            ],[
                'name' => $userToSeed['name'],
                'password' => $password
            ]);

            switch ($userToSeed['role']) {
                case Role::ADMIN: {
                    $user->assignRole(Role::ADMIN);
                    break;
                }
                case Role::VENDOR: {
                    $user->assignRole(Role::VENDOR);
                    break;
                }
                case Role::USER: {
                    $user->assignRole(Role::USER);
                    break;
                }
                default: {
                    $user->assignRole(Role::USER);
                    break;
                }
            }
        }
    }
}
