<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name'=> 'Muhammad Mamdouh',
            'email'=> 'admin@admin.com',
            'photo'=> 'sdf',
            'password'=> bcrypt(123456),

        ]);
//        User::create([
//            'name'=> 'Hassan Abo Ali',
//            'username'=> 'hassona',
//            'email'=> 'vendor@gmail.com',
//            'password'=> bcrypt(123456),
//            'role' => 'vendor',
//        ]);
//        User::create([
//            'name'=> 'Ahmed Ali',
//            'username'=> 'abohmaid',
//            'email'=> 'ahmed@gmail.com',
//            'password'=> bcrypt(123456),
//            'role' => 'customer',
//        ]);
    }
}
