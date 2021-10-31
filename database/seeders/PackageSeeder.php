<?php

namespace Database\Seeders;

use App\Models\Package;
use App\Models\User;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $packagePlans = [
            [
                'name' => 'Basic',
                'description' => 'This is description for Basic Plan',
                'price' => 25,
                'award_bids' => 20,
            ],
            [
                'name' => 'Silver',
                'description' => 'This is description for Silver Plan',
                'price' => 50,
                'award_bids' => 40,
            ],
            [
                'name' => 'Golden',
                'description' => 'This is description for Golden Plan',
                'price' => 75,
                'award_bids' => 60,
            ],
            [
                'name' => 'Diamond',
                'description' => 'This is description for Diamond Plan',
                'price' => 100,
                'award_bids' => 80,
            ],
        ];

        foreach ($packagePlans as $packagePlan) {
            Package::create($packagePlan + [
                'created_by' => User::first()->id ?? 1,
            ]);
        }
    }
}
