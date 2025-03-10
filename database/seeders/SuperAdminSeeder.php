<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'role' => 'SUPER_ADMIN',
                'user_code' => 'USER00001',
                'username' => 'superadmin',
                'password' => Hash::make('superadminpassword'),
                'email' => 'superadmin@example.com',
                'phone' => '1234567890',
                'prefix' => 'นาย',
                'first_name' => 'Super',
                'middle_name' => '',
                'last_name' => 'Admin',
                'position' => 'Administrator',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'role' => 'TEACHER',
                'user_code' => 'USER00002',
                'username' => 'teacher',
                'password' => Hash::make('teacherpassword'),
                'email' => 'teacher@example.com',
                'phone' => '0987654321',
                'prefix' => 'นาย',
                'first_name' => 'John',
                'middle_name' => '',
                'last_name' => 'Doe',
                'position' => 'Teacher',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        User::factory()->count(8)->create();
    }
}
