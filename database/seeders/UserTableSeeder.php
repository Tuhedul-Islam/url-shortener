<?php

namespace Database\Seeders;

use App\Models\BasicParameter\Organization;
use App\Models\HRManagement\EmployeeInformation;
use App\Models\MasterConfiguration\Designation;
use App\Models\MasterConfiguration\OfficeName;
use App\Models\User;
use App\Models\UserManagement\OfficeAppointment;
use App\Models\UserManagement\UserProfile;
use App\Models\UserManagement\UserRole;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        User::create([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'generated_unique_id' => '147852369',
            'language' => 'en',
            'country_id' => null,
            'phone' => '01960139091',
            'whatsapp_no' => '01303579744',
            'email' => 'admin@gmail.com',
            'reference_no' => null,
            'password' => bcrypt(12345678),
            'two_factor_enabled' => 1,
            'user_role_id' => UserRole::first()->id ??null,
            'user_type_id' => 1,
            'user_expire_date' => now()->format('Y-m-d'),
            'status' => 1,
            ]);
    }
}
