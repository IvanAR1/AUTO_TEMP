<?php

namespace Database\Seeders;

use App\Models\esp8266;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Esp8266Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        esp8266::factory(10)->create();
    }
}
