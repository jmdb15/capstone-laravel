<?php

namespace Database\Seeders;

use App\Models\Users;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Users::create([
            'name' => 'Your Name',
            'email' => 'CSSPadmin@bulsu.edu.ph',
            'password' => Hash::make('CSSPnum1'),
            'type' => 'admin'
        ]);
        Users::create([
            'name' => 'Guest',
            'email' => 'none',
            'password' => Hash::make('nopassword'),
            'type' => 'guest'
        ]);
    }
}
