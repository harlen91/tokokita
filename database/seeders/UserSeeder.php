<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'ucok',
            'email' => 'ucok@tokokita.id',
            'password' => Hash::make('ucok1234'),
            'role' => 'admin'
        ]);
        User::create([
            'name' => 'budi',
            'email' => 'budi@tokokita.id',
            'password' => Hash::make('budi1234'),
            'role' => 'costumer'
        ]);
    }
}
