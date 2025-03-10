<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject_code',
        'subject_title',
        'grades',
    ];
    public function learningUnits()
    {
        return $this->hasMany(LearningUnit::class, 'subject_id');
    }
    public function teachingAssignments()
    {
        return $this->hasMany(TeachingAssignment::class, 'subject_id');
    }
}
