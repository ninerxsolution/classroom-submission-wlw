<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'teaching_assignment_id',
        'unit_id',
        'sub_unit_id',
        'title',
        'description',
        'max_score',
        'assigned_date',
        'due_date',
        'year_id',
    ];

    /**
     * Get the teaching assignment that owns the assignment.
     */

    public function teachingAssignment()
    {
        return $this->belongsTo(TeachingAssignment::class);
    }

    /**
     * Get the learning unit that owns the assignment.
     */
    public function learningUnit()
    {
        return $this->belongsTo(LearningUnit::class, 'unit_id');
    }

    /**
     * Get the sub learning unit that owns the assignment.
     */
    public function subLearningUnit()
    {
        return $this->belongsTo(SubLearningUnit::class, 'sub_unit_id');
    }

    /**
     * Get the academic year that owns the assignment.
     */
    public function academicYear()
    {
        return $this->belongsTo(AcademicYear::class, 'year_id');
    }
}
