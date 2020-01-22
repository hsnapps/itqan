<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEditableFieldToSomeTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->boolean('reserved')->default(0);
        });

        Schema::table('instructors', function (Blueprint $table) {
            $table->boolean('reserved')->default(0);
        });

        Schema::table('levels', function (Blueprint $table) {
            $table->boolean('reserved')->default(0);
        });

        Schema::table('mission_levels', function (Blueprint $table) {
            $table->boolean('reserved')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('reserved');
        });

        Schema::table('instructors', function (Blueprint $table) {
            $table->dropColumn('reserved');
        });

        Schema::table('levels', function (Blueprint $table) {
            $table->dropColumn('reserved');
        });

        Schema::table('mission_levels', function (Blueprint $table) {
            $table->dropColumn('reserved');
        });
    }
}
