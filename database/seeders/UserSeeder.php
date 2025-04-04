<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'lastname' => 'Admin',
            'role_id' => 1,
            'rut' => '123456789',
            'phone' => '123456789012',
            'email' => 'test@gmail.com',
            'password' => bcrypt('12345678'),
        ]) ;
    }
}
