<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@importacionessalazar.com'],
            [
                'name' => 'Administrador',
                'password' => Hash::make('andres@salazar26'), // cámbialo por una contraseña segura
            ]
        );
    }
}


