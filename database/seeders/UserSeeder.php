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
            'name' => 'Pungky',
            'email' => 'pungkyrama@gmail.com',
            'password' => Hash::make('0o0o0o0o')
        ]);

        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123')
        ]);

        DB::table('users')->insert([
            'name' => 'User 1',
            'email' => 'user1@gmail.com',
            'password' => Hash::make('123')
        ]);
    }
}
