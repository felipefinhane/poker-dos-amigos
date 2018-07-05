<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampeonatoPontuacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'campeonato_pontuacoes',
            function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('campeonato_id');
                $table->integer('position');
                $table->decimal('value', 10, 2);
                $table->timestamps();
                $table->foreign('campeonato_id')
                    ->references('id')
                    ->on('campeonatos');
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campeonato_pontuacoes');
    }
}
