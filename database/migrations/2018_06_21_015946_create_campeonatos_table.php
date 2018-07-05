<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampeonatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'campeonatos',
            function (Blueprint $table) {
                $table->increments('id');
                $table->string('title', 60);
                $table->text('description')->nullable();
                $table->date('start_date');
                $table->date('end_date')->nullable();
                $table->decimal('price', 10, 2);
                $table->timestamps();
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
        Schema::dropIfExists('campeonatos');
    }
}
