<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\AcademicYear;

class AssignmentController extends Controller
{
    public static function getLatestAcademicYearAndSemester()
    {
        $latestAcademicYear = AcademicYear::orderBy('year_label', 'desc')
            ->orderBy('year_semester', 'desc')
            ->first();

        return $latestAcademicYear;
    }
}
