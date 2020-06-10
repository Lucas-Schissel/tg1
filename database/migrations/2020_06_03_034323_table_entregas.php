<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableEntregas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entregas', function (Blueprint $table) {
            $table->id('id');
            $table->string("cod_pedido",255);
            $table->unsignedBigInteger('id_cidade');
            $table->string("cep",10);
            $table->string("rua",255);
            $table->string("numero",255); 
            $table->string("complemento",255);
            $table->string("bairro",255);            
            $table->string("destinatario",255);
            $table->text("conteudo");
            $table->unsignedBigInteger('id_empresa');
            $table->unsignedBigInteger('id_status');
            $table->unsignedBigInteger('id_motoboy');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entregas');
    }
}
