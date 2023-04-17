<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DataUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
               'name'=>'Admin',
               'email'=>'admin@mail.com',
               'role'=>'1',
               'password'=> bcrypt('admin2023'),
            ],
            [
               'name'=>'Pakar',
               'email'=>'pakar@mail.com',
               'role'=>'2',
               'password'=> bcrypt('pakar123'),
            ],
        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}