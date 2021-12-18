<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropiedadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propiedades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipo_inmueble')->nullable();
            $table->foreign('tipo_inmueble')
                ->references('id')->on('tipos_inmuebles')
                ->onDelete('set null');

            $table->string('espropietario')->nullable();
            $table->string('pqsolicita')->nullable();
            $table->string('horizontal')->nullable();
            $table->string('arrendado')->nullable();

            $table->unsignedBigInteger('estrato')->nullable();
            $table->foreign('estrato')
                ->references('id')->on('estratos')
                ->onDelete('set null');

            $table->unsignedBigInteger('ciudad')->nullable();
            $table->foreign('ciudad')
                ->references('id')->on('ciudades')
                ->onDelete('set null');

            $table->string('direccion')->nullable();
            $table->string('barrio_catastral')->nullable();
            $table->string('upz')->nullable();
            $table->string('localidad')->nullable();
            $table->string('direccion_comp')->nullable();
            $table->integer('tiempo_inm')->nullable();
            $table->string('longitud')->nullable();
            $table->string('latitud')->nullable();
            $table->unsignedBigInteger('estado')->nullable();
            $table->foreign('estado')
                ->references('id')->on('estados_inmuebles')
                ->onDelete('set null');

            $table->unsignedBigInteger('remodelado')->nullable();
            $table->foreign('remodelado')
                ->references('id')->on('remodelados')
                ->onDelete('set null');

            $table->string('tuberia')->nullable();
            $table->integer('piso')->nullable();
            $table->string('ascensor')->nullable();
            $table->float('a_construida')->nullable();
            $table->float('a_privada')->nullable();
            $table->float('a_terreno')->nullable();


            $table->unsignedBigInteger('mat_habitacion')->nullable();
            $table->foreign('mat_habitacion')
                ->references('id')->on('mats_piso_habitacions')
                ->onDelete('set null');

            $table->unsignedBigInteger('mat_piso_cocina')->nullable();
            $table->foreign('mat_piso_cocina')
                ->references('id')->on('mats_piso_cocinas')
                ->onDelete('set null');

            $table->unsignedBigInteger('mat_piso_bano')->nullable();
            $table->foreign('mat_piso_bano')
                ->references('id')->on('mats_piso_banos')
                ->onDelete('set null');

            $table->unsignedBigInteger('mat_piso_zsocial')->nullable();
            $table->foreign('mat_piso_zsocial')
                ->references('id')->on('mats_piso_zsocials')
                ->onDelete('set null');

            $table->unsignedBigInteger('nivel')->nullable();
            $table->foreign('nivel')
                ->references('id')->on('niveles')
                ->onDelete('set null');

            $table->integer('n_hab')->nullable();

            $table->unsignedBigInteger('n_banos')->nullable();


            $table->string('tiene_garajes')->nullable();
            $table->string('gje_cubierto')->nullable();
            $table->integer('no_garajes')->nullable();
            $table->unsignedBigInteger('tipo_garajes')->nullable();
            $table->foreign('tipo_garajes')
                ->references('id')->on('tipo_garajes')
                ->onDelete('set null');

            $table->unsignedBigInteger('mb_cocina')->nullable();
            $table->foreign('mb_cocina')
                ->references('id')->on('mb_cocinas')
                ->onDelete('set null');

            $table->unsignedBigInteger('tipo_estufa')->nullable();
            $table->foreign('tipo_estufa')
                ->references('id')->on('tipos_estufas')
                ->onDelete('set null');

            $table->unsignedBigInteger('tipo_horno')->nullable();
            $table->foreign('tipo_horno')
                ->references('id')->on('tipos_hornos')
                ->onDelete('set null');

            $table->unsignedBigInteger('tipo_cocina')->nullable();
            $table->foreign('tipo_cocina')
                ->references('id')->on('tipos_cocinas')
                ->onDelete('set null');

            $table->unsignedBigInteger('tipo_calentador')->nullable();
            $table->foreign('tipo_calentador')
                ->references('id')->on('calentadores')
                ->onDelete('set null');

            $table->unsignedBigInteger('tipo_vista')->nullable();
            $table->foreign('tipo_vista')
                ->references('id')->on('vistas')
                ->onDelete('set null');

            $table->unsignedBigInteger('zona_social')->nullable();
            $table->foreign('zona_social')
                ->references('id')->on('zonas_sociales')
                ->onDelete('set null');

            $table->unsignedBigInteger('material_fachada')->nullable();
            $table->foreign('material_fachada')
                ->references('id')->on('materiales_fachadas')
                ->onDelete('set null');

            $table->string('terraza')->nullable();
            $table->string('area_terraza')->nullable();
            $table->string('chimenea')->nullable();
            $table->string('balcon')->nullable();
            $table->integer('area_balcon')->nullable();
            $table->string('b_servicio')->nullable();
            $table->string('b_social')->nullable();
            $table->string('estudio')->nullable();
            $table->string('deposito')->nullable();
            $table->string('hab_servicio')->nullable();
            $table->string('star')->nullable();
            $table->string('zona_lavanderia')->nullable();
            $table->string('patio')->nullable();
            $table->string('entrega_cortinas')->nullable();
            $table->string('piscina_privada')->nullable();
            $table->string('sauna_privada')->nullable();
            $table->string('turco_privado')->nullable();
            $table->string('jacuzzi_privado')->nullable();
            $table->string('tina_privada')->nullable();
            $table->string('aire_privado')->nullable();
            $table->string('calefaccion_privada')->nullable();

            $table->unsignedBigInteger('tipo_vigilancia')->nullable();
            $table->foreign('tipo_vigilancia')
                ->references('id')->on('tipos_vigilancias')
                ->onDelete('set null');

            $table->unsignedBigInteger('tipo_seguridad')->nullable();
            $table->foreign('tipo_seguridad')
                ->references('id')->on('tipos_seguridads')
                ->onDelete('set null');

            $table->unsignedBigInteger('tipo_cuota')->nullable();
            $table->foreign('tipo_cuota')
                ->references('id')->on('tipos_cuotas')
                ->onDelete('set null');

            $table->string('nombre_c_e')->nullable();
            $table->string('adm_cp')->nullable();
            $table->string('adm_cd')->nullable();
            $table->string('pq_visitantes')->nullable();
            $table->string('bicicletero')->nullable();
            $table->string('s_social')->nullable();
            $table->string('bbq')->nullable();
            $table->string('s_juntas')->nullable();
            $table->string('p_infantil')->nullable();
            $table->string('gimnasio')->nullable();
            $table->string('turco')->nullable();
            $table->string('sauna')->nullable();
            $table->string('c_squash')->nullable();
            $table->string('c_tenis')->nullable();
            $table->string('c_multiple')->nullable();
            $table->string('s_juegos')->nullable();
            $table->string('s_estudio')->nullable();
            $table->string('lavanderia_c')->nullable();
            $table->string('planta_e')->nullable();
            $table->string('certificado')->nullable();
            $table->string('habitado')->nullable();
            $table->string('piscina')->nullable();
            $table->integer('n_ascensores')->nullable();
            $table->string('jardin_interior')->nullable();
            $table->string('chip')->nullable();
            $table->string('matricula')->nullable();
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
        Schema::dropIfExists('propiedades');
    }
}
