<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grades')->insert([
            [
                'grade_label' => 'ม.1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'grade_label' => 'ม.2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'grade_label' => 'ม.3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'grade_label' => 'ม.4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'grade_label' => 'ม.5',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'grade_label' => 'ม.6',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
