<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Vinkla\Hashids\Facades\Hashids;
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
        // Adding an admin user
        User::create([
            'name' => 'Andafa Darling',
            'username' => 'KS'.Hashids::encode(1),
            'email' => 'kryptoshares@gmail.com',
            'email_verified_at' => now(),
            'status' => 1,
            'password' => Hash::make('admin'),
            'remember_token' => Str::random(10),
            'ref_id' => 1,
            'role' => 'admin',
        ]);
    }
}
