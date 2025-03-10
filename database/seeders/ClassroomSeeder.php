<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classrooms = [];

        for ($grade = 1; $grade <= 6; $grade++) {
            for ($section = 1; $section <= 6; $section++) {
                $classrooms[] = [
                    'grade_id' => $grade,
                    'classroom_label' => "ม.$grade/$section",
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        DB::table('classrooms')->insert($classrooms);
    }
}
