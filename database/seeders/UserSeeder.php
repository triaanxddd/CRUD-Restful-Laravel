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
            "email" => "user@example.com",
            "username" => "user123",
            "password" => bcrypt("12345"),
            "firstname" => "John",
            "lastname" => "Doe",
        ]);
    }
}
