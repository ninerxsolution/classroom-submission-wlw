<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LearningUnit extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject_id',
        'unit_title',
        'unit_description',
        'assume_score',
    ];

    /**
     * Get the subject that owns the learning unit.
     */
    // public function subject()
    // {
    //     return $this->belongsTo(Subject::class);
    // }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function subLearningUnits()
    {
        return $this->hasMany(SubLearningUnit::class, 'unit_id');
    }
    public function assignments()
    {
        return $this->hasMany(Assignment::class, 'unit_id');
    }
}
