<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@arnika.ai',
            'password' => Hash::make('secret'),
            'is_admin' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'user',
            'email' => 'user@arnika.ai',
            'password' => Hash::make('secret'),
            'is_admin' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
