<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\Classroom;
use App\Models\AcademicYear;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classrooms = Classroom::all();
        $currentYear = now()->year;

        foreach ($classrooms as $classroom) {
            for ($i = 0; $i < 6; $i++) {
                $year = $currentYear - $i;
                $academicYear = AcademicYear::where('year_label', $year)->first();

                if ($academicYear) {
                    Student::factory()->count(5)->create([
                        'classroom_id' => $classroom->id,
                        'year_id' => $academicYear->id,
                    ]);
                }
            }
        }
    }
}
