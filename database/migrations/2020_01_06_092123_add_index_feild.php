<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIndexFeild extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->smallInteger('question_index')->default(0)->after('id');
        });
        Schema::table('lesson_files', function (Blueprint $table) {
            $table->smallInteger('file_index')->default(0)->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('questions', function (Blueprint $table) {
            Schema::table('questions', function (Blueprint $table) {
                $table->dropColumn('question_index');
            });
            Schema::table('lesson_files', function (Blueprint $table) {
                $table->dropColumn('file_index');
            });
        });
    }
}
