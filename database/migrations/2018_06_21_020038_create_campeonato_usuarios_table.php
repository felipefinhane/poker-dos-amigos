<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampeonatoUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'campeonato_usuarios',
            function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('user_id');
                $table->unsignedInteger('campeonato_id');
                $table->smallInteger('administrator');
                $table->smallInteger('stat');
                $table->timestamps();
                $table->foreign('user_id')
                    ->references('id')
                    ->on('users');
                $table->foreign('campeonato_id')
                    ->references('id')
                    ->on('campeonatos');
                $table->index(
                    [
                        'stat'
                    ]
                );
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
        Schema::dropIfExists('campeonato_usuarios');
    }
}
