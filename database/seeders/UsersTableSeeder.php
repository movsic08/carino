<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            // Admin
            [
                'name' => 'Admin',
                'username' => 'adminfpop',
                'email' => 'fpopalaminos@gmail.com',
                'password' => Hash::make('adminpassword'),
                'phone' => '09467474379',
                'role' => 'admin',
                'status' => 'active',
            ],

            // Staff
            [
                'name' => 'Staff',
                'username' => 'stafffpop',
                'email' => 'staff@gmail.com',
                'password' => Hash::make('staffpassword'),
                'phone' => null,
                'role' => 'staff',
                'status' => 'active',
            ],

            // User
            [
                'name' => 'User',
                'username' => 'userfpop',
                'email' => 'user@gmail.com',
                'password' => Hash::make('userpassword'),
                'phone' => null,
                'role' => 'user',
                'status' => 'active',
            ],
        ]);
    }
}
