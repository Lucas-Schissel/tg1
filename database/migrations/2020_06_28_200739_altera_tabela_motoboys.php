<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlteraTabelaMotoboys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('motoboy', function (Blueprint $table) {
            $table->string('email')->after('telefone'); 
            $table->string('senha')->after('email');
            $table->unsignedBigInteger('id_disponibilidade')->after('senha');
            $table->unsignedBigInteger('id_liberacao')->after('id_disponibilidade');

            $table->foreign('id_disponibilidade')->references('id')->on('disponibilidade');
            $table->foreign('id_liberacao')->references('id')->on('liberacao');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropColumn('email');
        Schema::dropColumn('senha');
        Schema::dropColumn('id_disponibilidade');
        Schema::dropColumn('id_liberacao');
    }
}
