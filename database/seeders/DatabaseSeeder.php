<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(UserRoleSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(RolePermissionSeeder::class);
    }
}
