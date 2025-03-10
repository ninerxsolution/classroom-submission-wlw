<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Assignment;
use App\Models\TeachingAssignment;
use App\Models\LearningUnit;
use App\Models\SubLearningUnit;
use App\Models\AcademicYear;

class AssignmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teachingAssignments = TeachingAssignment::all();
        $subLearningUnits = SubLearningUnit::all();

        foreach ($subLearningUnits as $subUnit) {
            $unit = $subUnit->learningUnit;

            if ($unit) {
                foreach ($teachingAssignments as $teachingAssignment) {
                    // Ensure the assignment is created only once per sub-learning unit
                    Assignment::factory()->create([
                        'teaching_assignment_id' => $teachingAssignment->id,
                        'unit_id' => $unit->id,
                        'sub_unit_id' => $subUnit->id,
                        'year_id' => $teachingAssignment->year_id,
                    ]);
                    break;
                }
            }
        }
    }
}
