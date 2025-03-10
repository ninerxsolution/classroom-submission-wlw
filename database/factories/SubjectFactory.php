<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Subject;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subject>
 */
class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Subject::class;


    public function definition()
    {
        $subjectTitles = [
            'Mathematics',
            'Science',
            'History',
            'Geography',
            'English',
            'Physical Education',
            'Art',
            'Music',
            'Computer Science',
            'Biology',
            'Chemistry',
            'Physics',
            'Economics',
            'Literature',
            'Social Studies'
        ];

        return [
            'subject_code' => $this->faker->unique()->numerify('SUB#####'),
            // 'subject_title' => $this->faker->sentence(3),
            'subject_title' => $this->faker->randomElement($subjectTitles),
            'grades' => $this->faker->randomElement(['ม.1', 'ม.2', 'ม.3', 'ม.4', 'ม.5', 'ม.6']),
        ];
    }
}
