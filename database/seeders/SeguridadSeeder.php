<?php

namespace Database\Seeders;

use App\Models\Tipos_seguridad;
use Illuminate\Database\Seeder;

class SeguridadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $seguridad = new Tipos_seguridad();
        $seguridad->desc_tipo_seguridad = "No";
        $seguridad->save();        

        $seguridad3 = new Tipos_seguridad();
        $seguridad3->desc_tipo_seguridad = "Biométrico";
        $seguridad3->save();    
    }
}
