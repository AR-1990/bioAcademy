<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminCredentialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::create([
            'first_name' => 'Admin',
            'last_name' => 'admin', 
            'email' => 'admin@biouniversity.com',
            'is_enrolled' => 3,
            'role'=>1,
            'password' => bcrypt('password'),
            "phone_number"=>987876,
            'dob'=>'2023-9-2',
            'gender'=>'Male',
            'address_line'=>"karachi",
            'city'=>'USA',
            'country'=>"USA",
            'postal_code'=>435,
        ]);
    }
}
