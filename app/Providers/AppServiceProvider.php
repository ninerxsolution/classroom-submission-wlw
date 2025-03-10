<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\ActiveAcademicYearController;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();

        view()->composer('*', function ($view) {
            $latestAcademicYear = HeaderController::getLatestAcademicYearAndSemester();
            $view->with('latestAcademicYear', $latestAcademicYear);
        });

        view()->composer('*', function ($view) {
            $activeYear = ActiveAcademicYearController::getActiveAcademicYear();
            $view->with('activeYear', $activeYear);
        });
    }
}
