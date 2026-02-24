<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Drama', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Ficção Científica', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Suspense', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Ação', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Comédia', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Aventura', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Em Breve', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
