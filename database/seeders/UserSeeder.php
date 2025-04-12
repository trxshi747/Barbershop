<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin.User',
            'phone' => '0649157670',
            'email' => 'tl4trxsh@gmail.com',
            'password' => Hash::make('uruma1234'),
            'role' => 'admin'
        ]);
        $barber = User::create([
            'name' => 'Barber.User',
            'phone' => '0649157679',
            'email' => 'huaweipoint01@gmail.com',
            'password' => Hash::make('uruma1234'),
            'role' => 'barber'
        ]);
        $user = User::create([
            'name' => 'User',
            'phone' => '0649157699',
            'email' => 'user@gmail.com',
            'password' => Hash::make('uruma1234'),
            'role' => 'user'
        ]);
    }
}
