<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropietariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propietarios', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('lastname');
            $table->biginteger('doc_number')->nullable();
            $table->string('email');
            $table->string('phone');
            $table->string('full_number');
            $table->unsignedBigInteger('tipo_doc')->nullable();
            $table->foreign('tipo_doc')
                ->references('id')->on('tipos_documentos')
                ->onDelete('set null');
            $table->string('paso')->nullable();            
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
        Schema::dropIfExists('propietarios');
    }
}
