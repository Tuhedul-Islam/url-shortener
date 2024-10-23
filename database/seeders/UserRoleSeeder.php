<?php

namespace Database\Seeders;

use App\Models\UserManagement\UserRole;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UserRoleSeeder extends Seeder
{
    public function run()
    {
        $roles = array(
            array('id' => '1','name' => 'Master Admin','guard_name' => 'api','short_name' => 'MA','menu_position' => '1','status' => '1','created_by' => '1','updated_by' => '1','created_at' => '2023-08-15 18:42:04','updated_at' => '2023-08-15 18:42:04','deleted_at' => NULL),
            array('id' => '2','name' => 'Sub Admin','guard_name' => 'api','short_name' => 'SA','menu_position' => '1','status' => '1','created_by' => '1','updated_by' => '1','created_at' => '2023-08-15 18:42:04','updated_at' => '2023-08-15 18:42:04','deleted_at' => NULL),
            array('id' => '3','name' => 'Student','guard_name' => 'api','short_name' => 'S','menu_position' => '1','status' => '1','created_by' => '1','updated_by' => '1','created_at' => '2023-08-15 18:42:04','updated_at' => '2023-08-15 18:42:04','deleted_at' => NULL),
            array('id' => '4','name' => 'Teacher','guard_name' => 'api','short_name' => 'T','menu_position' => '1','status' => '1','created_by' => '1','updated_by' => '1','created_at' => '2023-08-15 18:42:04','updated_at' => '2023-08-15 18:42:04','deleted_at' => NULL),
            array('id' => '5','name' => 'Others','guard_name' => 'api','short_name' => 'Others','menu_position' => '1','status' => '1','created_by' => '1','updated_by' => '1','created_at' => '2023-08-15 18:42:04','updated_at' => '2023-08-15 18:42:04','deleted_at' => NULL),
        );

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        UserRole::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        UserRole::insert($roles);
    }
}
