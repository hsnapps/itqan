<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 50);
            $table->string('header', 80)->nullable();
            $table->string('description', 500)->nullable();
            $table->string('image', 20)->nullable();
            $table->string('video', 20)->nullable();
            $table->unsignedInteger('category_id')->nullable();
            $table->unsignedInteger('level_id')->nullable();
            $table->unsignedInteger('instructor_id')->nullable();
            $table->timestamps();

            $table->foreign('instructor_id')->references('id')->on('instructors');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('level_id')->references('id')->on('levels');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lessons');
    }
}
