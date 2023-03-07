<?php

namespace Database\Seeders;

use App\Models\UserChannel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\channel;

class UserChannelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserChannel::factory()
                     ->count(10)
                     ->create();
    }
}
