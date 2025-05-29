<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'ani',
                'email' => 'ani@gmail.com',
                'password' => '12345678',
            ],

            // Add more players as needed
        ];
        foreach ($users as $user) {
            \App\Models\User::create($user);
        }
    }
}
