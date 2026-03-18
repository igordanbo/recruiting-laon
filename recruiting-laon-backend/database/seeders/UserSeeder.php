<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([

            [
                'name' => 'User',
                'email' => 'user@user.com',
                'password' => bcrypt('password'),
                'birth_date' => Carbon::now()->subYears(25)->format('Y-m-d'),
                'gender' => 'female',
                'role' => 'user',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('password'),
                'birth_date' => Carbon::now()->subYears(30)->format('Y-m-d'),
                'gender' => 'male',
                'role' => 'admin',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

        ]);
    }
}
