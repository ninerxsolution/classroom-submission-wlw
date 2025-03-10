<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\GradesRecord;
use App\Models\AcademicYear;
use App\Models\Student;
use App\Models\Subject;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GradesRecord>
 */
class GradesRecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = GradesRecord::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'year_id' => AcademicYear::factory(),
            'student_id' => Student::factory(),
            'subject_id' => Subject::factory(),
            'final_score' => $this->faker->randomFloat(2, 0, 100),
        ];
    }
}
