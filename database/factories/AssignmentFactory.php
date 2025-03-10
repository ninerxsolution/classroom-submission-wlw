<?php

namespace Database\Factories;

use App\Models\Assignment;
use App\Models\TeachingAssignment;
use App\Models\LearningUnit;
use App\Models\SubLearningUnit;
use App\Models\AcademicYear;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Assignment>
 */
class AssignmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Assignment::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $assignedDate = $this->faker->dateTimeBetween('-1 year', 'now');
        $dueDate = $this->faker->dateTimeBetween($assignedDate, '+1 month');

        return [
            'teaching_assignment_id' => TeachingAssignment::factory(),
            'unit_id' => LearningUnit::factory(),
            'sub_unit_id' => SubLearningUnit::factory(),
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'max_score' => $this->faker->randomFloat(2, 5, 5),
            'assigned_date' => $assignedDate,
            'due_date' => $dueDate,
            'year_id' => AcademicYear::factory(),
        ];
    }
}
