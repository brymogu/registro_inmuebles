<?php

namespace Database\Seeders;

use App\Models\Estados_inmueble;
use Illuminate\Database\Seeder;

class EstadoInmuebleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $estado = new Estados_inmueble();
        $estado->desc_estado= "Sobre planos";
        $estado->save();

        $estado2 = new Estados_inmueble();
        $estado2->desc_estado = "En construcción";
        $estado2->save();

        $estado3 = new Estados_inmueble();
        $estado3->desc_estado = "Para estrenar";
        $estado3->save();

        $estado4 = new Estados_inmueble();
        $estado4->desc_estado = "Remodelado";
        $estado4->save();

        $estado5 = new Estados_inmueble();
        $estado5->desc_estado = "Usado sin remodelar";
        $estado5->save();
    }
}
