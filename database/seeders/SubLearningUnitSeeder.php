<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\LearningUnit;
use App\Models\SubLearningUnit;

class SubLearningUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $learningUnits = LearningUnit::all();

        foreach ($learningUnits as $unit) {
            SubLearningUnit::factory()->count(1)->create([
                'unit_id' => $unit->id,
            ]);
        }
    }
}
