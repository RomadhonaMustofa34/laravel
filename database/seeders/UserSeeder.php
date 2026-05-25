<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | ADMIN
        |--------------------------------------------------------------------------
        */

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        /*
        |--------------------------------------------------------------------------
        | APPROVER LEVEL 1
        |--------------------------------------------------------------------------
        */

        User::create([
            'name' => 'Manager Operasional',
            'email' => 'manager@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'approver',
        ]);

        /*
        |--------------------------------------------------------------------------
        | APPROVER LEVEL 2
        |--------------------------------------------------------------------------
        */

        User::create([
            'name' => 'Kepala Pool',
            'email' => 'pool@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'approver',
        ]);

        /*
        |--------------------------------------------------------------------------
        | OPTIONAL APPROVER
        |--------------------------------------------------------------------------
        */

        User::create([
            'name' => 'Supervisor Tambang',
            'email' => 'supervisor@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'approver',
        ]);
    }
}