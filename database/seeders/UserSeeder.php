<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'admin',
            'email' => 'admin@test.com',
            'role' => 'admin',
            'password' => Hash::make('12345678'),
            'poly' => 'Others',
            'major' => 'Others',
            'marketing' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
