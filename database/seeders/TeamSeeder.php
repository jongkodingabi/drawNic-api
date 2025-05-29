<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('teams')->insert([
            [
                'name' => 'Team A',
                'color' => 'Red',
            ],
            [
                'name' => 'Team B',
                'color' => 'Blue',
            ],
            [
                'name' => 'Team C',
                'color' => 'Green',
            ],
            [
                'name' => 'Team D',
                'color' => 'Yellow',
            ],
        ]);
    }
}
