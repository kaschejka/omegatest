<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLinkToUserPositions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_positions', function (Blueprint $table) {
          $table->unsignedBigInteger('company_user_id');
           $table->foreign('company_user_id')->references('id')->on('company_users')->onDelete('cascade');
           $table->unsignedBigInteger('position_id');
           $table->foreign('position_id')->references('id')->on('positions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_positions', function (Blueprint $table) {
            //
        });
    }
}
