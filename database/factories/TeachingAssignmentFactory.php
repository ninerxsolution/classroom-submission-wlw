<?php

namespace Database\Factories;

use App\Models\TeachingAssignment;
use App\Models\Subject;
use App\Models\User;
use App\Models\Classroom;
use App\Models\AcademicYear;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TeachingAssignment>
 */
class TeachingAssignmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = TeachingAssignment::class;

    public function definition()
    {
        return [
            'subject_id' => Subject::factory(),
            'teacher_id' => User::factory()->state(['role' => 'TEACHER']),
            'classroom_id' => Classroom::factory(),
            'year_id' => AcademicYear::factory(),
        ];
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    /**
     * Get the teacher that owns the teaching assignment.
     */
    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    /**
     * Get the classroom that owns the teaching assignment.
     */
    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    /**
     * Get the academic year that owns the teaching assignment.
     */
    public function academicYear()
    {
        return $this->belongsTo(AcademicYear::class, 'year_id');
    }
}
