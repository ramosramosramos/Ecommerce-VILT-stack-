<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserRole;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'phone' => '09090909s0909',
            'password' => bcrypt('password'),

        ]);

        User::factory()->create([
            'name' => 'seller',
            'email' => 'seller@example.com',
            'phone' => '090902909090900s',
            'password' => bcrypt('password'),

        ]);
        User::factory()->create([
            'name' => 'customer',
            'email' => 'customer@example.com',
            'phone' => '1909090909s0000',
            'password' => bcrypt('password'),

        ]);

        UserRole::create([
            'user_id'=>'1',
            'role'=>'admin',
        ]);
        UserRole::create([
            'user_id'=>'2',
            'role'=>'seller',
        ]);
        UserRole::create([
            'user_id'=>'3',
            'role'=>'customer',
        ]);
    }
}
