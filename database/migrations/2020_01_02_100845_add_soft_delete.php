<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSoftDelete extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('instructors', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('lessons', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('lesson_files', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('suggestions', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('questions', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });
        Schema::table('instructors', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });
        Schema::table('lessons', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });
        Schema::table('lesson_files', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });
        Schema::table('suggestions', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });
        Schema::table('questions', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });
    }
}
