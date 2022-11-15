<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $managers= User::create([
           'name' => 'manager',
           'email' => 'manager@gmail.com',
           'user_type' => '1', //for manager
           'is_active' => '1', 
           'password' => Hash::make('manager123'),
        ]);

        $staffs = User::create([
            'name' => 'staff',
            'email' => 'staff@gmail.com',
            'user_type' => '0', //for employee
            'is_active' => '1',
            'password' => Hash::make('staff123'),
        ]);

    }
}
