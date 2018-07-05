<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'partidas',
            function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('campeonato_id');
                $table->date('game_date');
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
        Schema::dropIfExists('partidas');
    }
}
