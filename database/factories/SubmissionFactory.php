<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Submission;
use App\Models\Assignment;
use App\Models\Student;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Submission>
 */
class SubmissionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Submission::class;
    public function definition()
    {
        $submitStatus = $this->faker->randomElement(['y', 'n']);

        return [
            'assignments_id' => Assignment::factory(),
            'student_id' => Student::factory(),
            'submit_status' => $submitStatus,
            'actual_score' => $submitStatus === 'y' ? $this->faker->randomFloat(2, 2, 5) : null, // Only score if 'y'
            'submit_date' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
