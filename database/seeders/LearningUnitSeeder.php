<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\LearningUnit;
use App\Models\Subject;

class LearningUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subjects = Subject::all();

        foreach ($subjects as $subject) {
            LearningUnit::factory()->count(1)->create([
                'subject_id' => $subject->id,
            ]);
        }
    }
}
