<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMissionLevelToCourses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('lessons', function (Blueprint $table) {
            $table->dropForeign(['mission_level_id']);
            $table->dropColumn('mission_level_id');
        });
        Schema::enableForeignKeyConstraints();

        Schema::table('courses', function (Blueprint $table) {
            $table->unsignedInteger('mission_level_id')->default(1)->after('category_id');
            $table->foreign('mission_level_id')->references('id')->on('mission_levels');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lessons', function (Blueprint $table) {
            $table->unsignedInteger('mission_level_id')->nullable()->after('level_id');
            $table->foreign('mission_level_id')->references('id')->on('mission_levels');
        });

        Schema::disableForeignKeyConstraints();
        Schema::table('courses', function (Blueprint $table) {
            $table->dropForeign(['mission_level_id']);
            $table->dropColumn('mission_level_id');
        });
        Schema::enableForeignKeyConstraints();
    }
}
