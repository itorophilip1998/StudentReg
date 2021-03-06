<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->string('regNo');
            $table->string('name');
            $table->string('courses_grades');
            $table->string('department');
            $table->string('school');
            $table->string('credit_point');
            $table->string('credit_unit');
            $table->string('session');
            $table->string('semester');
            $table->string('program');
            $table->string('gpa');
            $table->string('cgpa');
            $table->string('result');
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
        Schema::dropIfExists('results');
    }
}
