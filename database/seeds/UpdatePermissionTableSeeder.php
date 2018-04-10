<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;

class UpdatePermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = [
        	[
        		'name' => 'user-role-list',
        		'display_name' => 'Display User Listing',
        		'description' => 'See only Listing Of User'
        	],
        	[
        		'name' => 'user-role-create',
        		'display_name' => 'Create User',
        		'description' => 'Create New User'
        	],
        	[
        		'name' => 'user-role-edit',
        		'display_name' => 'Edit User',
        		'description' => 'Edit User'
        	],
        	[
        		'name' => 'user-role-delete',
        		'display_name' => 'Delete User',
        		'description' => 'Delete User'
        	],
        ];

        foreach ($permission as $key => $value) {
        	Permission::create($value);
        }
    }
}
