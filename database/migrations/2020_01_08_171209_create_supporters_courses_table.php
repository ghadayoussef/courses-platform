<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupportersCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supporters_courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('supporter_id');
            $table->unsignedBigInteger('course_id');
            $table->foreign('supporter_id')->references('id')->on('supporters');
            $table->foreign('course_id')->references('id')->on('courses');
            $table->boolean('status');//banned or unbanned
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
        Schema::dropIfExists('supporters_courses');
    }
}
