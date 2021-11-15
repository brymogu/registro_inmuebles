<?php

namespace Database\Seeders;

use App\Models\tipo_garajes;
use Illuminate\Database\Seeder;

class NoGarajesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $garajes = new tipo_garajes();
        $garajes->tipo_garajes =  "Privado";
        $garajes->save();

        $garajes1 = new tipo_garajes();
        $garajes1->tipo_garajes =  "Independiente";
        $garajes1->save();

        $garajes2 = new tipo_garajes();
        $garajes2->tipo_garajes = "Servidumbre";
        $garajes2->save();
    }
}
