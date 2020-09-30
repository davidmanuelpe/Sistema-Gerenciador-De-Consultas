<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendamentos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->dateTime('data');
            $table->unsignedBigInteger('agenda_id');
            $table->unsignedBigInteger('paciente_id');

            $table->foreign('agenda_id')->references('id')->on('agendas');
            $table->foreign('paciente_id')->references('id')->on('pacientes');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agendamentos');
    }
}
