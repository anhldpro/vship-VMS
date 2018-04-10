<?php
/**
 * Created by PhpStorm.
 * User: Mr Lee
 * Date: 4/2/2018
 * Time: 1:15 AM
 */
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder {
    public function run()
    {
        User::create([
            'username' => 'admin',
            'email' => 'admin@abc.com',
            'password' => 'admin123'
        ]);
    }
}