<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentEnrollment extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'classroom_id',
        'year_id',
        'status',
        'enrollment_date',
        'graduation_date',
        'transfer_date',
        'suspension_date',
        'expulsion_date',
    ];

    /**
     * Get the student that owns the enrollment.
     */
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    /**
     * Get the classroom that owns the enrollment.
     */
    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    /**
     * Get the academic year that owns the enrollment.
     */
    public function academicYear()
    {
        return $this->belongsTo(AcademicYear::class, 'year_id');
    }
}
