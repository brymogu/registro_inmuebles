<?php

namespace Database\Seeders;

use App\Models\Tipos_vigilancia;

use Illuminate\Database\Seeder;

class VigilanciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $vigilancia = new Tipos_vigilancia();
        $vigilancia->desc_tipo_vigilancia = "12h";
        $vigilancia->save();  

        $vigilancia2 = new Tipos_vigilancia();
        $vigilancia2->desc_tipo_vigilancia = "24h";
        $vigilancia2->save();              
    }
}
