<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradesRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'year_id',
        'student_id',
        'subject_id',
        'final_score',
    ];

    /**
     * Get the academic year that owns the grades record.
     */
    public function academicYear()
    {
        return $this->belongsTo(AcademicYear::class, 'year_id');
    }

    /**
     * Get the student that owns the grades record.
     */
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    /**
     * Get the subject that owns the grades record.
     */
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
