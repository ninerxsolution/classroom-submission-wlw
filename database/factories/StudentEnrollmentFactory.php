<?php

namespace Database\Factories;

use App\Models\StudentEnrollment;
use App\Models\Student;
use App\Models\Classroom;
use App\Models\AcademicYear;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StudentEnrollment>
 */
class StudentEnrollmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = StudentEnrollment::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $status = $this->faker->randomElement(['enrolled', 'graduated', 'transferred', 'suspended', 'expelled']);
        $enrollmentDate = $this->faker->date();
        $graduationDate = $status === 'graduated' ? $this->faker->date() : null;
        $transferDate = $status === 'transferred' ? $this->faker->date() : null;
        $suspensionDate = $status === 'suspended' ? $this->faker->date() : null;
        $expulsionDate = $status === 'expelled' ? $this->faker->date() : null;

        return [
            'student_id' => Student::factory(),
            'classroom_id' => Classroom::factory(),
            'year_id' => AcademicYear::factory(),
            'status' => $status,
            'enrollment_date' => $enrollmentDate,
            'graduation_date' => $graduationDate,
            'transfer_date' => $transferDate,
            'suspension_date' => $suspensionDate,
            'expulsion_date' => $expulsionDate,
        ];
    }
}
