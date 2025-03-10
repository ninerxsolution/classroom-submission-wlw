<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\AcademicYear;

class ActiveAcademicYearController extends Controller
{
    public static function getActiveAcademicYear()
    {
        $activeAcademicYear = AcademicYear::where('status', 'active')
            ->orderBy('year_label', 'desc')
            ->orderBy('year_semester', 'desc')
            ->first();

        return $activeAcademicYear;
    }
}
