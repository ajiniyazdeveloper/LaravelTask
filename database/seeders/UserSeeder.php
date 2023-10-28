<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Manager',
            'role_id' => 1,
            'email' => 'manage@ajiniyaz.dev',
            'password' => Hash::make('secret')
        ]);
        User::create([
            'name' => 'Client',
            'role_id' => 2,
            'email' => 'client@ajiniyaz.dev',
            'password' => Hash::make('secret')
        ]);
    }
}
