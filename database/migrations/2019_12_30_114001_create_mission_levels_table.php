<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMissionLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mission_levels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->timestamps();
        });

        Schema::table('lessons', function (Blueprint $table) {
            $table->unsignedInteger('mission_level_id')->nullable()->after('level_id');
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
        Schema::dropIfExists('mission_levels');
        
        Schema::disableForeignKeyConstraints();
        Schema::table('lessons', function (Blueprint $table) {
            $table->dropColumn('mission_level_id');
            $table->dropForeign(['mission_level_id']);
        });
        Schema::enableForeignKeyConstraints();
    }
}
