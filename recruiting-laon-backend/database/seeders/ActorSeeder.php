<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ActorSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('actors')->insert([
            ['name' => 'Carey Mulligan', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Joaquin Phoenix', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Scarlett Johansson', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'John Krasinski', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Mark Hamill', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Roman Griffin Davis', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
