<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'role' => $this->faker->randomElement(['SUPER_ADMIN', 'ADMIN', 'TEACHER']),
            'role' => $this->faker->randomElement(['TEACHER', 'TEACHER', 'TEACHER']),
            'user_code' => $this->faker->unique()->numerify('USER#####'),
            'username' => $this->faker->unique()->userName,
            'password' => Hash::make('password'),
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->unique()->numerify('+66#########'),
            'prefix' => $this->faker->randomElement(['นาย', 'นาง', 'นางสาว']),
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'position' => $this->faker->jobTitle,
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
}
