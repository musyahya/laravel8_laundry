<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123123123'),
            'role_id' => 1
        ]);

        User::create([
            'name' => 'karyawan',
            'email' => 'karyawan@gmail.com',
            'password' => bcrypt('123123123'),
            'role_id' => 2
        ]);

        User::create([
            'name' => 'konsumen',
            'email' => 'konsumen@gmail.com',
            'password' => bcrypt('123123123'),
            'role_id' => 3
        ]);

        Role::create([
            'nama' => 'admin'
        ]);

        Role::create([
            'nama' => 'karyawan'
        ]);

        Role::create([
            'nama' => 'konsumen'
        ]);
    }
}
