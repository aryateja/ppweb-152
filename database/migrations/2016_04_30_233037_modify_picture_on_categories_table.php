<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyPictureColumnOnCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('Picture');
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->string('Picture')->nullable();
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
            $table->dropColumn('Picture');
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->binary('Picture')->nullable();
        });
    }
}
