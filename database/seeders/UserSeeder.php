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
                'username' => 'admin@fyp.com',
                'email' => 'admin@fyp.com',
                'role' => Role::ADMIN,
            ],
            [
                'name' => 'Nabeel Pasha',
                'username' => 'nabeelyousafpasha@gmail.com',
                'email' => 'nabeelyousafpasha@gmail.com',
                'role' => Role::ADMIN,
            ],
            [
                'name' => 'Vendor',
                'username' => 'vendor@fyp.com',
                'email' => 'vendor@fyp.com',
                'role' => Role::VENDOR,
            ],
            [
                'name' => 'User',
                'username' => 'user@fyp.com',
                'email' => 'user@fyp.com',
                'role' => Role::USER,
            ],
        ];

        foreach ($users as $userToSeed) {
            $user = User::firstOrCreate([
                'username' => $userToSeed['username'],
            ],[
                'email' => $userToSeed['email'],
                'name' => $userToSeed['name'],
                'password' => $password,
                'approved_at' => now(),
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
