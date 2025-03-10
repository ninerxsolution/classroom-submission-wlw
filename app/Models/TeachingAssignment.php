<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeachingAssignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject_id',
        'teacher_id',
        'classroom_id',
        'year_id',
    ];

    public function academicYear()
    {
        return $this->belongsTo(AcademicYear::class, 'year_id');
    }

    /**
     * Get the subject that owns the teaching assignment.
     */
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    /**
     * Get the assignments for the teaching assignment.
     */
    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }

    // public function subject()
    // {
    //     return $this->belongsTo(Subject::class);
    // }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    // public function academicYear()
    // {
    //     return $this->belongsTo(AcademicYear::class);
    // }
}
