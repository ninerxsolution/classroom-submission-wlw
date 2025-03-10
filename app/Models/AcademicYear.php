<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicYear extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'year_label',
        'year_semester',
        'start_date',
        'end_date',
        'status',
    ];
}
