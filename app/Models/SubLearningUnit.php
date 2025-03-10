<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubLearningUnit extends Model
{
    use HasFactory;

    protected $fillable = [
        'unit_id',
        'sub_unit_title',
        'sub_unit_description',
        'assume_score',
    ];

    /**
     * Get the learning unit that owns the sub-learning unit.
     */
    public function learningUnit()
    {
        return $this->belongsTo(LearningUnit::class, 'unit_id');
    }
    public function assignments()
    {
        return $this->hasMany(Assignment::class, 'sub_unit_id');
    }
}
