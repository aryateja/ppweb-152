<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyPhotoColumnOnEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropColumn('Photo');
        });

        Schema::table('employees', function (Blueprint $table) {
            $table->string('Photo')->nullable()->after('Extension');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropColumn('Photo');
        });

        Schema::table('employees', function (Blueprint $table) {
            $table->binary('Photo')->nullable()->after('Extension');
        });
    }
}
