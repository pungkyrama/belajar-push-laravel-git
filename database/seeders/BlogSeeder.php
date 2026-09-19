<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('blogs')->insert([
            'tittle' => 'Blog 1',
            'deskripsi' => 'Ini adalah deskripsi untuk blog 1',
            'status' => 'Active',
            'user_id' => 1
        ]);
    }
}
