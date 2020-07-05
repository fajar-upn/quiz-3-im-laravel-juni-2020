<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('artikel', function (Blueprint $table) {
            $table->unsignedBigInteger('fk_pengguna');
            $table->foreign('fk_pengguna')->references('id')->on('pengguna');
        });

        Schema::table('follow', function (Blueprint $table) {
            $table->unsignedBigInteger('fk_following');
            $table->foreign('fk_following')->references('id')->on('pengguna');
            $table->unsignedBigInteger('fk_follower');
            $table->foreign('fk_follower')->references('id')->on('pengguna');
        });   
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('artikel', function (Blueprint $table) {
            //
            $table->dropForeign(['fk_pengguna']);
            $table->dropColumn('fk_pengguna');

        });

        Schema::table('artikel', function (Blueprint $table) {
            //
            $table->dropForeign(['fk_following']);
            $table->dropColumn('fk_following');
            $table->dropForeign(['fk_follower']);
            $table->dropColumn('fk_follower');


        });
    }
}
