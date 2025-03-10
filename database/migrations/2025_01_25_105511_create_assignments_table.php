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
        Schema::create('assignments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('teaching_assignment_id')->nullable();
            $table->foreign('teaching_assignment_id')->references('id')->on('teaching_assignments')->onDelete('set null');
            $table->unsignedBigInteger('unit_id')->nullable();
            $table->foreign('unit_id')->references('id')->on('learning_units')->onDelete('set null');
            $table->unsignedBigInteger('sub_unit_id')->nullable();
            $table->foreign('sub_unit_id')->references('id')->on('sub_learning_units')->onDelete('set null');
            $table->string('title');
            $table->text('description');
            $table->float('max_score');
            $table->dateTime('assigned_date');
            $table->dateTime('due_date');
            $table->unsignedBigInteger('year_id')->nullable();
            $table->foreign('year_id')->references('id')->on('academic_years')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assignments');
    }
};
