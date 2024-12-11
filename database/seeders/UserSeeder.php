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
        // Create the user
        $user = User::create([
            'name' => 'Javier Teheran Magallanez',
            'email' => 'javierteheran19@gmail.com',
            'password' => Hash::make('1002194617'),
        ]);

        // Assign the "admin" role to the user
        $user->assignRole('admin');
    }
}
