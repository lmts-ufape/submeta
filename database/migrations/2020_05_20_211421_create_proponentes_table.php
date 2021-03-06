<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProponentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proponentes', function (Blueprint $table) {
            $table->bigIncrements('id');
            //$table->string('CPF');
            $table->string('SIAPE')->nullable();
            //$table->string('email')->unique();
            $table->string('cargo');
            $table->string('vinculo');
            $table->string('titulacaoMaxima');
            $table->string('anoTitulacao');
            $table->string('areaFormacao');            
            $table->string('bolsistaProdutividade');
            $table->string('nivel')->nullable();
            $table->string('linkLattes');
            $table->timestamps();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proponentes');
    }
}
