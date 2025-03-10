<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AcademicYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currentYear = Carbon::now()->year;
        $academicYears = [];

        for ($i = 0; $i < 3; $i++) {
            $year = $currentYear - $i;

            // First semester
            $academicYears[] = [
                'year_label' => "$year",
                'year_semester' => '1',
                'start_date' => Carbon::create($year, 1, 1)->toDateTimeString(),
                'end_date' => Carbon::create($year, 6, 30)->toDateTimeString(),
                'created_at' => now(),
                'updated_at' => now(),
            ];

            // Second semester
            $academicYears[] = [
                'year_label' => "$year",
                'year_semester' => '2',
                'start_date' => Carbon::create($year, 7, 1)->toDateTimeString(),
                'end_date' => Carbon::create($year, 12, 31)->toDateTimeString(),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('academic_years')->insert($academicYears);
    }
}
