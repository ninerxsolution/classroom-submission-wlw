<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            SuperAdminSeeder::class,
            AcademicYearSeeder::class,
            GradeSeeder::class,
            ClassroomSeeder::class,
            SubjectSeeder::class,
            LearningUnitSeeder::class,
            SubLearningUnitSeeder::class,
            StudentSeeder::class,
            // StudentEnrollmentSeeder::class,
            TeachingAssignmentSeeder::class,
            AssignmentSeeder::class,
            SubmissionSeeder::class,
            // GradesRecordSeeder::class,
        ]);
    }
}
