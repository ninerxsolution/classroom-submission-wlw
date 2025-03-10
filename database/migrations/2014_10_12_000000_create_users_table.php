<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->enum('role', ['SUPER_ADMIN', 'ADMIN', 'TEACHER'])->default('TEACHER');
            $table->string('user_code')->unique();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('prefix');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('position');
            $table->rememberToken();
            $table->timestamps();
        });

        // Schema::create('year', function (Blueprint $table) {
        //     $table->id('year_id');
        //     $table->string('year_label');
        //     $table->dateTime('start_date');
        //     $table->dateTime('end_date');
        //     $table->timestamps();
        // });

        // Schema::create('classrooms', function (Blueprint $table) {
        //     $table->id('classroom_id');
        //     $table->string('grade')->unique();
        //     $table->string('classroom_label')->unique();
        //     $table->timestamps();
        // });

        // Schema::create('subjects', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('subject_id')->unique();
        //     $table->string('subject_name');
        //     $table->string('grade');
        //     $table->foreign('grade')->references('grade')->on('classrooms');
        //     $table->timestamps();
        // });

        // Schema::create('subject_unit', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('subject_id');
        //     $table->foreign('subject_id')->references('subject_id')->on('subjects');
        //     $table->string('unit_title');
        //     $table->string('unit_description');
        //     $table->integer('assume_score');
        //     $table->timestamps();
        // });

        // Schema::create('subject_sub_unit', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('subject_id');
        //     $table->foreign('subject_id')->references('subject_id')->on('subjects');
        //     $table->string('unit_id');
        //     $table->foreign('unit_id')->references('id')->on('subject_unit');
        //     $table->string('sub_unit_title');
        //     $table->string('sub_unit_description');
        //     $table->integer('assume_score');
        //     $table->timestamps();
        // });

        // Schema::create('students', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('student_unique_id')->unique();
        //     $table->string('classroom_label')->references('classroom_label')->on('classrooms');
        //     $table->string('phone')->unique();
        //     $table->string('email')->unique();
        //     $table->string('first_name');
        //     $table->string('middle_name');
        //     $table->string('last_name');
        //     $table->string('year_label')->references('year_label')->on('year');
        //     $table->timestamps();
        // });

        // Schema::create('main_teacher_classroom', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('classroom_label')->references('classroom_label')->on('classrooms');
        //     $table->string('teacher_id')->references('user_id')->on('users');
        //     $table->string('year_label')->references('year_label')->on('year');
        //     $table->timestamps();
        // });

        // Schema::create('teaching', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('subject_id')->references('subject_id')->on('subjects');
        //     $table->string('teacher_id')->references('user_id')->on('users');
        //     $table->string('classroom_label')->references('classroom_label')->on('classrooms');
        //     $table->string('year_label')->references('year_label')->on('year');
        //     $table->timestamps();
        // });

        // Schema::create('worksheets', function (Blueprint $table) {
        //     $table->id('worksheet_id');
        //     $table->string('teacher_id')->references('user_id')->on('users');
        //     $table->string('subject_unit')->references('unit_title')->on('subject_unit');
        //     $table->string('subject_sub_unit')->references('sub_unit_title')->on('subject_sub_unit');
        //     $table->string('worksheet_description');
        //     $table->integer('max_score');
        //     $table->dateTime('assigned_date');
        //     $table->dateTime('deadline_date');
        //     $table->string('year_label')->references('year_label')->on('year');
        //     $table->timestamps();
        // });

        // Schema::create('assignment', function (Blueprint $table) {
        //     $table->id('assignment_id');
        //     $table->string('worksheet_id')->references('worksheet_id')->on('worksheets');
        //     $table->string('student_id')->references('student_unique_id')->on('students');
        //     $table->index('score');
        //     $table->enum('max_score',    ['y', 'n']);
        //     $table->dateTime('submit_date');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('assignment');
        // Schema::dropIfExists('worksheets');
        // Schema::dropIfExists('teaching');
        // Schema::dropIfExists('main_teacher_classroom');
        // Schema::dropIfExists('students');
        // Schema::dropIfExists('subject_sub_unit');
        // Schema::dropIfExists('subject_unit');
        // Schema::dropIfExists('subjects');
        // Schema::dropIfExists('classrooms');
        // Schema::dropIfExists('year');
        Schema::dropIfExists('users');
    }
};
