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
       User::factory()->create(
        [
            'name'=>'user',
            'email'=>'new@gmail.com',
            'role'=>'user',
            'status'=>'active',
            'password'=>Hash::make('1234'),
        ]
       );
       User::factory()->create(
        [
            'name'=>'manager',
            'email'=>'admin@gmail.com',
            'role'=>'manager',
            'status'=>'active',
            'password'=>Hash::make('1234'),
        ]
       );
    }
}
