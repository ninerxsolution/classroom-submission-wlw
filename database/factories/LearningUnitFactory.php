<?php

namespace Database\Factories;

use App\Models\LearningUnit;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

class LearningUnitFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LearningUnit::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'subject_id' => $this->faker->numberBetween(1, 50),
            'unit_title' => $this->faker->unique()->sentence(3),
            'unit_description' => $this->faker->paragraph,
            'assume_score' => $this->faker->randomFloat(2, 20, 20),
        ];
    }
}
