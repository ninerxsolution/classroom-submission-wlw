<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Classroom;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Classroom>
 */
class ClassroomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Classroom::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        static $gradeSection = [];

        $grade = $this->faker->numberBetween(1, 6);
        $section = $this->faker->numberBetween(1, 6);

        while (in_array("ม.$grade/$section", $gradeSection)) {
            $grade = $this->faker->numberBetween(1, 6);
            $section = $this->faker->numberBetween(1, 6);
        }

        $gradeSection[] = "ม.$grade/$section";

        return [
            'grade_id' => $grade,
            'classroom_label' => "ม.$grade/$section",
        ];
    }
}
