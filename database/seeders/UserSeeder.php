<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name'      => 'Super Admin',
                'email'     => 'superadmin@somaeatery.com',
                'password'  => Hash::make('password'),
                'phone'     => '081234567890',
                'role'      => 'super_admin',
                'is_active' => true,
            ],
            [
                'name'      => 'Admin',
                'email'     => 'admin@somaeatery.com',
                'password'  => Hash::make('password'),
                'phone'     => '081234567891',
                'role'      => 'admin',
                'is_active' => true,
            ],
            [
                'name'      => 'Kasir',
                'email'     => 'kasir@somaeatery.com',
                'password'  => Hash::make('password'),
                'phone'     => '081234567892',
                'role'      => 'kasir',
                'is_active' => true,
            ],
            [
                'name'      => 'Customer',
                'email'     => 'customer@somaeatery.com',
                'password'  => Hash::make('password'),
                'phone'     => '081234567893',
                'role'      => 'customer',
                'is_active' => true,
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
