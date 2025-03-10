<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_code',
        'classroom_id',
        'phone',
        'email',
        'prefix',
        'first_name',
        'middle_name',
        'last_name',
        'year_id',
    ];

    /**
     * Get the classroom that the student belongs to.
     */
    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    /**
     * Get the academic year that the student belongs to.
     */
    public function academicYear()
    {
        return $this->belongsTo(AcademicYear::class, 'year_id');
    }
}
