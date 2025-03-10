<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SubLearningUnit>
 */
class SubLearningUnitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'unit_id' => $this->faker->numberBetween(1, 500),
            'sub_unit_title' => $this->faker->unique()->sentence(3),
            'sub_unit_description' => $this->faker->paragraph,
            'assume_score' => $this->faker->randomFloat(2, 2, 2),
        ];
    }
}
