<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => '$2y$10$lV0ueBZCSZ98AXwqWxQIl.N2ixqwZMN7W95CEJqGcYsuGNbtxymHO',
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
