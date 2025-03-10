<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Student;
use App\Models\Classroom;
use App\Models\AcademicYear;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'student_code' => $this->faker->unique()->numerify('STU#####'),
            'classroom_id' => Classroom::factory(),
            'phone' => $this->faker->unique()->numerify('+66#########'),
            'email' => $this->faker->unique()->safeEmail,
            'prefix' => $this->faker->randomElement(['นาย', 'นางสาว']),
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'year_id' => AcademicYear::factory(),
        ];
    }
}
