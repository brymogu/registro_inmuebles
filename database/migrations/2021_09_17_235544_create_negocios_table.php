<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNegociosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('negocios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('propietario')->nullable();
            $table->foreign('propietario')
                ->references('id')->on('propietarios')
                ->onDelete('set null');

            $table->unsignedBigInteger('propiedad')->nullable();
            $table->foreign('propiedad')
                ->references('id')->on('propiedades')
                ->onDelete('set null');

            $table->unsignedBigInteger('tipo_negocio')->nullable();
            $table->foreign('tipo_negocio')
                ->references('id')->on('tipos_negocios')
                ->onDelete('set null');

            $table->unsignedBigInteger('plan')->nullable();
            $table->foreign('plan')
                ->references('id')->on('planes')
                ->onDelete('set null');

            $table->biginteger('valor')->nullable();
            $table->biginteger('conc_precio')->nullable();
            $table->string('cpvj')->nullable();
            $table->string('asesor')->nullable();         
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
        Schema::dropIfExists('negocios');
    }
}
