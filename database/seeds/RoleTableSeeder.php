<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $role = [
        	[
        		'name' => 'super admin',
        		'display_name' => 'super admin',
        		'description' => 'Tất cả các quyền'
        	],
        	[
        		'name' => 'admin',
        		'display_name' => 'admin',
        		'description' => 'Tất cả quyền trừ thêm sửa xóa tài khoản'
        	]
        ];

        foreach ($role as $key => $value) {
        	Role::create($value);
        }
   
    }
}
