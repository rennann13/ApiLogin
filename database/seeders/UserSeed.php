<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!User::where('email', 'rennan@gmail.com.br')->first()){
            $superAdmin = User::create([
                'name' => 'Rennan',
                'email' => 'rennan@gmail.com.br',
                'password' => Hash::make('123456', ['rounds' => 12])
            ]);
        }
        if (!User::where('email', 'rennan2@gmail.com.br')->first()){
            $superAdmin = User::create([
                'name' => 'Rennan 2',
                'email' => 'rennan2@gmail.com.br',
                'password' => Hash::make('123456', ['rounds' => 12])
            ]);
        }
        if (!User::where('email', 'rennan3@gmail.com.br')->first()){
            $superAdmin = User::create([
                'name' => 'Rennan 3',
                'email' => 'rennan3@gmail.com.br',
                'password' => Hash::make('123456', ['rounds' => 12])
            ]);
        }
    }
}
