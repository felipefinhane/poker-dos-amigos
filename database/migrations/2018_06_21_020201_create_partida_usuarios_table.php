<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartidaUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'partida_usuarios',
            function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('partida_id');
                $table->unsignedInteger('campeonato_usuario_id');
                $table->smallInteger('paid');
                $table->smallInteger('position');
                $table->unsignedInteger('carrasco_id');
                $table->timestamps();
                $table->foreign('partida_id')
                    ->references('id')
                    ->on('partidas');
                $table->foreign('campeonato_usuario_id')
                    ->references('id')
                    ->on('campeonato_usuarios');
                $table->foreign('carrasco_id')
                    ->references('id')
                    ->on('campeonato_usuarios');
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
        Schema::dropIfExists('partida_usuarios');
    }
}
