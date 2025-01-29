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
             'name' => 'mahdi',
             'email' => 'mahdi@gmail.com',
             'password' => Hash::make('123'),
             'role'=>'admin'
         ]);
         User::create([
             'name' => 'reza',
             'email' => 'reza@gmail.com',
             'password' => Hash::make('123'),
             'role'=>'operator'
         ]);
         User::create([
             'name' => 'sara',
             'email' => 'sara@gmail.com',
             'password' => Hash::make('123'),
             'role'=>'operator'
         ]);

    }
}
