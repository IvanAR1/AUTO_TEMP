<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();
        $default = new User();
        $default->name_user = 'Danilo Iván';
        $default->lastname_user = 'Alanis Rocha';
        $default->alias_user = 'IvanAR1';
        $default->email = 'psoportepipsa@gmail.com';
        $default->email_user_verified_at = now();
        $default->password = Hash::make('12345678');
        $default->remember_token = Str::random(10);
        $default->save();
        User::factory(10)->create();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
