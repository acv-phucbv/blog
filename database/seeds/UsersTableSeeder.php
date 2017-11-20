<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create(['username' => 'superadmin', 'fullname' => 'Super Admin', 'password' => '123456', 'role' => \App\Models\User::ROLE_SUPER_ADMIN, 'email' => 'superadmin@gmail.com']);
        \App\Models\User::create(['username' => 'admin', 'fullname' => 'Admin', 'password' => '123456', 'role' => \App\Models\User::ROLE_ADMIN, 'email' => 'admin@gmail.com']);
        \App\Models\User::create(['username' => 'author', 'fullname' => 'Author', 'password' => '123456', 'role' => \App\Models\User::ROLE_AUTHOR, 'email' => 'author@gmail.com']);
    }
}
