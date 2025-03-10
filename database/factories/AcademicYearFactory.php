<?php

namespace Database\Factories;

use App\Models\AcademicYear;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AcademicYear>
 */
class AcademicYearFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = AcademicYear::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $year = $this->faker->year;
        $semester = $this->faker->randomElement(['1', '2']);
        $start_date = $semester == '1' ? Carbon::create($year, 1, 1) : Carbon::create($year, 7, 1);
        $end_date = $semester == '1' ? Carbon::create($year, 6, 30) : Carbon::create($year, 12, 31);

        return [
            'year_label' => $year,
            'year_semester' => $semester,
            'start_date' => $start_date->toDateTimeString(),
            'end_date' => $end_date->toDateTimeString(),
        ];
    }
}
