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
            'rut' => '12345678-9',
            'phone' => '123456789',
            'email' => 'test@gmail.com',
            'password' => bcrypt('12345678'),
        ]) ;
    }
}
