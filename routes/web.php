<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\EmployeeManagementController;
use App\Http\Controllers\ClassroomManagementController;
use App\Http\Controllers\StudentManagementController;
use App\Http\Controllers\SubjectManagementController;
use App\Http\Controllers\TeachingAssignmentManagementController;
use App\Http\Controllers\AcademicYearManagementController;
use App\Http\Controllers\LearningUnitController;
use App\Http\Controllers\SubLearningUnitController;

use App\Http\Controllers\TeacherDashboardController;
use App\Http\Controllers\TeacherSubjectController;
use App\Http\Controllers\TeacherRoomController;
use App\Http\Controllers\TeacherAssignmentController;
use App\Http\Controllers\TeacherAssignmentDetailController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('sign-in', [LoginController::class, 'showLoginForm'])->name('route-sign-in')->middleware('guest');

Route::get('/', function () {
    return view('welcome');
})->name('route-welcome');

Route::get('backoffice', function () {
    return view('backoffice');
})->name('route-backoffice')->middleware('auth', 'checkRole:SUPER_ADMIN,ADMIN');

Route::get('backoffice/employee-management', [EmployeeManagementController::class, 'index'])
    ->name('route-employee-management')
    ->middleware('auth', 'checkRole:SUPER_ADMIN,ADMIN');

Route::post('backoffice/employee-management/create', [EmployeeManagementController::class, 'store'])
    ->name('route-employee-create')
    ->middleware('auth', 'checkRole:SUPER_ADMIN,ADMIN');

Route::put('backoffice/employee-management/update/{id}', [EmployeeManagementController::class, 'update'])
    ->name('route-employee-update')
    ->middleware('auth', 'checkRole:SUPER_ADMIN,ADMIN');

Route::post('backoffice/employee-management/delete/{id}', [EmployeeManagementController::class, 'destroy'])
    ->name('route-employee-delete')
    ->middleware('auth', 'checkRole:SUPER_ADMIN,ADMIN');

// Route::get('backoffice/classroom-management', function () {
//     return view('classroom_management');
// })->name('route-classroom-management')->middleware('auth', 'checkRole:SUPER_ADMIN,ADMIN');
Route::get('backoffice/classroom-management', [ClassroomManagementController::class, 'index'])
    ->name('route-classroom-management')
    ->middleware('auth', 'checkRole:SUPER_ADMIN,ADMIN');

Route::post('backoffice/classroom-management/create', [ClassroomManagementController::class, 'store'])
    ->name('route-classroom-create')
    ->middleware('auth', 'checkRole:SUPER_ADMIN,ADMIN');

Route::post('backoffice/classroom-management/update/{classroom_id}', [ClassroomManagementController::class, 'update'])
    ->name('route-classroom-update')
    ->middleware('auth', 'checkRole:SUPER_ADMIN,ADMIN');

Route::delete('backoffice/classroom-management/delete/{classroom_id}', [ClassroomManagementController::class, 'destroy'])
    ->name('route-classroom-delete')
    ->middleware('auth', 'checkRole:SUPER_ADMIN,ADMIN');

// Route::get('backoffice/student-management', function () {
//     return view('student_management');
// })->name('route-student-management')->middleware('auth', 'checkRole:SUPER_ADMIN,ADMIN');

Route::get('backoffice/student-management', [StudentManagementController::class, 'index'])
    ->name('route-student-management')
    ->middleware('auth', 'checkRole:SUPER_ADMIN,ADMIN');

Route::get('backoffice/student-management/create', [StudentManagementController::class, 'create'])->name('student-management-add');

Route::get('backoffice/student-management/{id}/edit', [StudentManagementController::class, 'edit'])->name('student-management-edit.edit');

Route::post('backoffice/student-management/create', [StudentManagementController::class, 'store'])
    ->name('route-student-create')
    ->middleware('auth', 'checkRole:SUPER_ADMIN,ADMIN');

Route::post('backoffice/student-management/update/{student_id}', [StudentManagementController::class, 'update'])
    ->name('route-student-update')
    ->middleware('auth', 'checkRole:SUPER_ADMIN,ADMIN');

Route::delete('backoffice/student-management/delete/{student_id}', [StudentManagementController::class, 'destroy'])
    ->name('route-student-delete')
    ->middleware('auth', 'checkRole:SUPER_ADMIN,ADMIN');

// Route::get('backoffice/subject-management', function () {
//     return view('subject_management');
// })->name('route-subject-management')->middleware('auth', 'checkRole:SUPER_ADMIN,ADMIN');

Route::get('backoffice/subject-management', [SubjectManagementController::class, 'index'])
    ->name('route-subject-management')
    ->middleware('auth', 'checkRole:SUPER_ADMIN,ADMIN');

Route::get('backoffice/subject-management/{subject_id}/detail', [SubjectManagementController::class, 'detail'])
    ->name('route-subject-management.detail')
    ->middleware('auth', 'checkRole:SUPER_ADMIN,ADMIN');

Route::post('backoffice/subject-management/create', [SubjectManagementController::class, 'store'])
    ->name('route-subject-create')
    ->middleware('auth', 'checkRole:SUPER_ADMIN,ADMIN');

Route::post('backoffice/subject-management/update/{subject_id}', [SubjectManagementController::class, 'update'])
    ->name('route-subject-update')
    ->middleware('auth', 'checkRole:SUPER_ADMIN,ADMIN');

Route::post('backoffice/subject-management/delete/{subject_id}', [SubjectManagementController::class, 'destroy'])
    ->name('route-subject-delete')
    ->middleware('auth', 'checkRole:SUPER_ADMIN,ADMIN');

Route::post('backoffice/learning-unit/create', [LearningUnitController::class, 'store'])->name('route-learning-unit.create')->middleware('auth', 'checkRole:SUPER_ADMIN,ADMIN');
Route::post('backoffice/learning-unit/{id}', [LearningUnitController::class, 'update'])->name('route-learning-unit.update')->middleware('auth', 'checkRole:SUPER_ADMIN,ADMIN');
Route::delete('backoffice/learning-unit/{id}', [LearningUnitController::class, 'destroy'])->name('route-learning-unit.delete')->middleware('auth', 'checkRole:SUPER_ADMIN,ADMIN');

Route::post('backoffice/sub-learning-unit/create', [SubLearningUnitController::class, 'store'])->name('route-sub-learning-unit.create')->middleware('auth', 'checkRole:SUPER_ADMIN,ADMIN');
Route::post('backoffice/sub-learning-unit/{id}', [SubLearningUnitController::class, 'update'])->name('route-sub-learning-unit.update')->middleware('auth', 'checkRole:SUPER_ADMIN,ADMIN');
Route::delete('backoffice/sub-learning-unit/{id}', [SubLearningUnitController::class, 'destroy'])->name('route-sub-learning-unit.delete')->middleware('auth', 'checkRole:SUPER_ADMIN,ADMIN');

//////////////////////////////////////////////

Route::get('backoffice/teaching-assignment-management', [TeachingAssignmentManagementController::class, 'index'])
    ->name('route-teaching-assignment-management')
    ->middleware('auth', 'checkRole:SUPER_ADMIN,ADMIN');

Route::get('backoffice/teaching-assignment-management/{teaching_id}/view', [TeachingAssignmentManagementController::class, 'view'])
    ->name('route-teaching-assignment-management.view')
    ->middleware('auth', 'checkRole:SUPER_ADMIN,ADMIN');

Route::post('backoffice/teaching-assignment-management/create', [TeachingAssignmentManagementController::class, 'store'])
    ->name('route-teaching-assignment-create')
    ->middleware('auth', 'checkRole:SUPER_ADMIN,ADMIN');

Route::post('backoffice/teaching-assignment-management/update/{id}', [TeachingAssignmentManagementController::class, 'update'])
    ->name('route-teaching-assignment-update')
    ->middleware('auth', 'checkRole:SUPER_ADMIN,ADMIN');

Route::delete('backoffice/teaching-assignment-management/delete/{id}', [TeachingAssignmentManagementController::class, 'destroy'])
    ->name('route-teaching-assignment-delete')
    ->middleware('auth', 'checkRole:SUPER_ADMIN,ADMIN');


//////////////////////////////////////////////

Route::get('backoffice/academic_year-management', [AcademicYearManagementController::class, 'index'])
    ->name('route-academic_year-management')
    ->middleware('auth', 'checkRole:SUPER_ADMIN,ADMIN');

Route::post('backoffice/academic_year-management/create', [AcademicYearManagementController::class, 'store'])
    ->name('route-academic_year-create')
    ->middleware('auth', 'checkRole:SUPER_ADMIN,ADMIN');

Route::post('backoffice/academic_year-management/update/{academic_year_id}', [AcademicYearManagementController::class, 'update'])
    ->name('route-academic_year-update')
    ->middleware('auth', 'checkRole:SUPER_ADMIN,ADMIN');

Route::post('backoffice/academic_year-management/delete/{academic_year_id}', [AcademicYearManagementController::class, 'destroy'])
    ->name('route-academic_year-delete')
    ->middleware('auth', 'checkRole:SUPER_ADMIN,ADMIN');

//////////////////////////////////////////////

Route::get('dashboard', [TeacherDashboardController::class, 'index'])
    ->name('route-teacher-dashboard')
    ->middleware('auth', 'checkRole:TEACHER');

Route::get('subjects', [TeacherSubjectController::class, 'index'])
    ->name('route-teacher-subjects')
    ->middleware('auth', 'checkRole:TEACHER');

Route::get('rooms/teaching-classrooms-{id}', [TeacherRoomController::class, 'index'])
    ->name('route-teacher-rooms')
    ->middleware('auth', 'checkRole:TEACHER');

Route::get('rooms/teaching-classrooms-{teachingAssignmentId}/subject/assignment-{unitId}-{subUnitId}', [TeacherAssignmentController::class, 'index'])
    ->name('route-teacher-rooms-subject-assignment')
    ->middleware('auth', 'checkRole:TEACHER');

Route::get('rooms/teaching-classrooms-{teachingAssignmentId}/subject/assignment-{unitId}-{subUnitId}/detail-{id}', [TeacherAssignmentDetailController::class, 'index'])
    ->name('route-teacher-rooms-subject-assignment-detail')
    ->middleware('auth', 'checkRole:TEACHER');

// Route::get('rooms', function () {
//     return view('teacher.rooms');
// })->name('route-teacher-rooms')->middleware('auth', 'checkRole:TEACHER');

Route::get('classrooms', function () {
    return view('teacher.classrooms');
})->name('route-teacher-classrooms')->middleware('auth', 'checkRole:TEACHER');

Route::get('room-subject-unit', function () {
    return view('teacher.room-subject-unit');
})->name('route-teacher-room-subject-unit')->middleware('auth', 'checkRole:TEACHER');

Route::get('subject-desc', function () {
    return view('teacher.subject-desc');
})->name('route-teacher-subject-desc')->middleware('auth', 'checkRole:TEACHER');

Route::get('subject-unit-desc', function () {
    return view('teacher.subject-unit-desc');
})->name('route-teacher-subject-unit-desc')->middleware('auth', 'checkRole:TEACHER');

//////////////////////////////////////////////

Route::post('sign-in', [LoginController::class, 'login'])->middleware('guest');
Route::post('logout', [LoginController::class, 'logout'])->name('route-logout');
