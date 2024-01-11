<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        'name' => "super ec",
        'email' => 'super@gmail.com',
        'password' => Hash::make('password'),
        'role' => 'super'
      ]);
      DB::table('users')->insert([
        'name' => "Staff Lapangan",
        'email' => 'pakar@gmail.com',
        'password' => Hash::make('password'),
        'role' => 'expert'
      ]);
      DB::table('users')->insert([
        'name' => "Staff",
        'email' => 'staff@gmail.com',
        'password' => Hash::make('password'),
        'role' => 'staff'
      ]);
    }
}
