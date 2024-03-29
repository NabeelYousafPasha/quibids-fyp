<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MessageStatus;

class MessageStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (MessageStatus::getAllMessageStatuses() as $status) {
            MessageStatus::firstOrCreate([
                'code' => $status,
            ], [
                'name' => ucfirst($status),
            ]);
        }
    }
}
