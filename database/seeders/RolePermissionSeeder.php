<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserManagement\UserRole;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // Permissions
        $permissions = [
            'dashboard' => [ // Module
                'dashboard_overview' => [ // Submodule
                    [ 'name' => 'dashboard_list', 'module_nick_name' => 'Dashboard', 'sub_module_nick_name' => 'Dashboard', 'menu_position' => 1,]
                ]
            ],
            'user_management' => [ // Module
                'user' => [ // Submodule
                    ['name' => 'user_list', 'module_nick_name' => 'User Management', 'sub_module_nick_name' => 'User', 'menu_position' => 1,],
                    ['name' => 'user_add', 'module_nick_name' => 'User Management', 'sub_module_nick_name' => 'User', 'menu_position' => 1,],
                    ['name' => 'user_edit', 'module_nick_name' => 'User Management', 'sub_module_nick_name' => 'User', 'menu_position' => 1,],
                    ['name' => 'user_delete', 'module_nick_name' => 'User Management', 'sub_module_nick_name' => 'User', 'menu_position' => 1,],
                ],
                'user_role' => [ // Submodule
                    ['name' => 'user_role_list', 'module_nick_name' => 'User Management', 'sub_module_nick_name' => 'User Role', 'menu_position' => 1,],
                    ['name' => 'user_role_add', 'module_nick_name' => 'User Management', 'sub_module_nick_name' => 'User Role', 'menu_position' => 1,],
                    ['name' => 'user_role_edit', 'module_nick_name' => 'User Management', 'sub_module_nick_name' => 'User Role', 'menu_position' => 1,],
                    ['name' => 'user_role_delete', 'module_nick_name' => 'User Management', 'sub_module_nick_name' => 'User Role', 'menu_position' => 1,],
                ],
            ],
            'configuration' => [ // Module
                'country' => [ // Submodule
                    ['name' => 'country_list', 'module_nick_name' => 'Configuration', 'sub_module_nick_name' => 'Country', 'menu_position' => 1,],
                    ['name' => 'country_add', 'module_nick_name' => 'Configuration', 'sub_module_nick_name' => 'Country', 'menu_position' => 1,],
                    ['name' => 'country_edit', 'module_nick_name' => 'Configuration', 'sub_module_nick_name' => 'Country', 'menu_position' => 1,],
                    ['name' => 'country_status_change', 'module_nick_name' => 'Configuration', 'sub_module_nick_name' => 'Country', 'menu_position' => 1,],
                ],
                'division' => [ // Submodule
                    ['name' => 'division_list', 'module_nick_name' => 'Configuration', 'sub_module_nick_name' => 'Division', 'menu_position' => 1,],
                    ['name' => 'division_add', 'module_nick_name' => 'Configuration', 'sub_module_nick_name' => 'Division', 'menu_position' => 1,],
                    ['name' => 'division_edit', 'module_nick_name' => 'Configuration', 'sub_module_nick_name' => 'Division', 'menu_position' => 1,],
                    ['name' => 'division_status_change', 'module_nick_name' => 'Configuration', 'sub_module_nick_name' => 'Division', 'menu_position' => 1,],
                ],
                'district' => [ // Submodule
                    ['name' => 'district_list', 'module_nick_name' => 'Configuration', 'sub_module_nick_name' => 'District', 'menu_position' => 1,],
                    ['name' => 'district_add', 'module_nick_name' => 'Configuration', 'sub_module_nick_name' => 'District', 'menu_position' => 1,],
                    ['name' => 'district_edit', 'module_nick_name' => 'Configuration', 'sub_module_nick_name' => 'District', 'menu_position' => 1,],
                    ['name' => 'district_status_change', 'module_nick_name' => 'Configuration', 'sub_module_nick_name' => 'District', 'menu_position' => 1,],
                ],
                'thana' => [ // Submodule
                    ['name' => 'thana_list', 'module_nick_name' => 'Configuration', 'sub_module_nick_name' => 'Thana', 'menu_position' => 1,],
                    ['name' => 'thana_add', 'module_nick_name' => 'Configuration', 'sub_module_nick_name' => 'Thana', 'menu_position' => 1,],
                    ['name' => 'thana_edit', 'module_nick_name' => 'Configuration', 'sub_module_nick_name' => 'Thana', 'menu_position' => 1,],
                    ['name' => 'thana_status_change', 'module_nick_name' => 'Configuration', 'sub_module_nick_name' => 'Thana', 'menu_position' => 1,],
                ],
            ],
            'setting' => [ // Module
                'homepage' => [ // Submodule
                    ['name' => 'homepage_list', 'module_nick_name' => 'Setting', 'sub_module_nick_name' => 'Homepage', 'menu_position' => 1,],
                    ['name' => 'homepage_add', 'module_nick_name' => 'Setting', 'sub_module_nick_name' => 'Homepage', 'menu_position' => 1,],
                    ['name' => 'homepage_edit', 'module_nick_name' => 'Setting', 'sub_module_nick_name' => 'Homepage', 'menu_position' => 1,],
                    ['name' => 'homepage_delete', 'module_nick_name' => 'Setting', 'sub_module_nick_name' => 'Homepage', 'menu_position' => 1,],
                ],
            ],
            'passbook' => [ // Module
                'debit_credit' => [ // Submodule
                    ['name' => 'debit_list', 'module_nick_name' => 'Passbook', 'sub_module_nick_name' => 'Debit', 'menu_position' => 1,],
                    ['name' => 'credit_list', 'module_nick_name' => 'Passbook', 'sub_module_nick_name' => 'Credit', 'menu_position' => 1,],
                ],
            ],
            'balance_transfer' => [ // Module
                'balance_transfer_sub' => [ // Submodule
                    ['name' => 'balance_transfer_list', 'module_nick_name' => 'Balance Transfer', 'sub_module_nick_name' => 'Balance Transfer Sub', 'menu_position' => 1,],
                    ['name' => 'balance_transfer_create', 'module_nick_name' => 'Balance Transfer', 'sub_module_nick_name' => 'Balance Transfer Sub', 'menu_position' => 1,],
                ],
            ],
            'student' => [ // Module
                'approve_pending' => [ // Submodule
                    ['name' => 'approve_list', 'module_nick_name' => 'Student', 'sub_module_nick_name' => 'Approve Pending', 'menu_position' => 1,],
                    ['name' => 'pending_list', 'module_nick_name' => 'Student', 'sub_module_nick_name' => 'Approve Pending', 'menu_position' => 1,],
                    ['name' => 'approve', 'module_nick_name' => 'Student', 'sub_module_nick_name' => 'Approve Pending', 'menu_position' => 1,],
                ],
            ],
            'faq' => [ // Module
                'faq_sub' => [ // Submodule
                    ['name' => 'faq_list', 'module_nick_name' => 'Faq', 'sub_module_nick_name' => 'Faq Sub', 'menu_position' => 1,],
                ],
            ],
            'certificate' => [ // Module
                'certificate_sub' => [ // Submodule
                    ['name' => 'certificate_list', 'module_nick_name' => 'Certificate', 'sub_module_nick_name' => 'Certificate Sub', 'menu_position' => 1,],
                ],
            ],
            'about' => [ // Module
                'about_sub' => [ // Submodule
                    ['name' => 'about_list', 'module_nick_name' => 'About', 'sub_module_nick_name' => 'About Sub', 'menu_position' => 1,],
                ],
            ],
            'course' => [ // Module
                'course_sub' => [ // Submodule
                    ['name' => 'course_list', 'module_nick_name' => 'Course', 'sub_module_nick_name' => 'Course Sub', 'menu_position' => 1,],
                ],
            ],
            'meeting' => [ // Module
                'meeting_sub' => [ // Submodule
                    ['name' => 'meeting_list', 'module_nick_name' => 'Meeting', 'sub_module_nick_name' => 'Meeting Sub', 'menu_position' => 1,],
                ],
            ],
            'contact' => [ // Module
                'contact_sub' => [ // Submodule
                    ['name' => 'contact_list', 'module_nick_name' => 'Contact', 'sub_module_nick_name' => 'Contact Sub', 'menu_position' => 1,],
                ],
            ],
        ];

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Permission::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        foreach ($permissions as $moduleKey => $module) {
            if (!empty($module['name'])){
                Permission::updateOrCreate([
                    'name' => $module['name'],
                    'module' => $moduleKey,
                    'sub_module' => NULL,
                    'module_nick_name' => $module['module_nick_name'],
                    'sub_module_nick_name' => NULL,
                    'menu_position' => $module['menu_position'],
                ],[
                    'guard_name' => 'api'
                ]);
            } else{
                foreach ($module as $subModuleKey => $subModule) {
                    if (!empty($subModule['name'])){
                        Permission::updateOrCreate([
                            'name' => $subModule['name'],
                            'module' => $moduleKey,
                            'sub_module' => $subModuleKey,
                            'module_nick_name' => $subModule['module_nick_name'],
                            'sub_module_nick_name' => $subModule['sub_module_nick_name'],
                            'menu_position' => $subModule['menu_position'],
                        ],[
                            'guard_name' => 'api'
                        ]);
                    } else{
                        foreach ($subModule as $key => $permission) {
                            Permission::updateOrCreate([
                                'name' => $permission['name'],
                                'module' => $moduleKey,
                                'sub_module' => $subModuleKey,
                                'module_nick_name' => $permission['module_nick_name'],
                                'sub_module_nick_name' => $permission['sub_module_nick_name'],
                                'menu_position' => $permission['menu_position'],
                            ],[
                                'guard_name' => 'api'
                            ]);
                        }
                    }
                }
            }
        }

        // Roles
        $role = Role::find(1);
        $role->givePermissionTo(Permission::all());

        $user = User::find(1);
        $user->syncRoles($role);

    }
}
