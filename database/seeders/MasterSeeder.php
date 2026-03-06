<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class MasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Prime Logic Soft',
            'email' => 'superadmin@primelogicsoft.com',
            'mobile' => '8825206064',
            'password' => Hash::make('123456@@'),
            'gender' => 'Male',
            'profile_image' => createNameInitialImage('Prime Logic Soft'),
        ]);
    }
}
