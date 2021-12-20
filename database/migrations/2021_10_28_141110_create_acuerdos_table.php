<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcuerdosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acuerdos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->longText('cuerpo');
            $table->unsignedBigInteger('plan')->nullable();
            $table->foreign('plan')
                ->references('id')->on('planes')
                ->onDelete('set null');
            $table->unsignedBigInteger('tipo_negocio')->nullable();
            $table->foreign('tipo_negocio')
                ->references('id')->on('tipos_negocios')
                ->onDelete('set null');
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
        Schema::dropIfExists('acuerdos');
    }
}
