<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "email" => "triansyahputra13@gmail.com",
            "username" => "triansyah123",
            "password" => bcrypt("12345"),
            "firstname" => "Trian",
            "lastname" => "Syahputra",
        ]);
    }
}
