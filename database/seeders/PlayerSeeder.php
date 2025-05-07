<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $players = [
            [
                'name' => 'Jamie Vardy',
                'telephone' => '1234567890',
                'position' => 'Forward',
                'major' => 'Computer Science',
                'age' => 25,
            ],
            [
                'name' => 'Toni kross',
                'telephone' => '0987654321',
                'position' => 'Midfielder',
                'major' => 'Mathematics',
                'age' => 22,
            ],
            // Add more players as needed
        ];
        foreach ($players as $player) {
            \App\Models\Player::create($player);
        }
    }
}
