<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@gpbsgcw.edu.pk'],
            [
                'name'              => 'College Admin',
                'password'          => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );
    }
}
