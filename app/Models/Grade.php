<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    // Define the inverse relationship to the Classroom model
    public function classrooms()
    {
        return $this->hasMany(Classroom::class, 'grade_id');
    }
}
