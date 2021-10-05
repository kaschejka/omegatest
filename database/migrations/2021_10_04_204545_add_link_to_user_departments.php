<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLinkToUserDepartments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_departments', function (Blueprint $table) {
          $table->unsignedBigInteger('company_user_id');
           $table->foreign('company_user_id')->references('id')->on('company_users');
           $table->unsignedBigInteger('department_id');
           $table->foreign('department_id')->references('id')->on('departments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_departments', function (Blueprint $table) {
            //
        });
    }
}
