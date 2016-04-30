<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyHomepageOnSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('suppliers', function (Blueprint $table) {
            $table->dropColumn('HomePage');
        });

        Schema::table('suppliers', function (Blueprint $table) {
            $table->string('HomePage')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('suppliers', function (Blueprint $table) {
            $table->dropColumn('HomePage');
        });

        Schema::table('suppliers', function (Blueprint $table) {
            $table->mediumText('HomePage')->nullable();
        });
    }
}
