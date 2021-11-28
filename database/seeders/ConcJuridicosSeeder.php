<?php

namespace Database\Seeders;

use App\Models\Conc_juridicos;
use Illuminate\Database\Seeder;

class ConcJuridicosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $conc_juridico = new Conc_juridicos();
        $conc_juridico->des_conc_juridicos = "Viable";
        $conc_juridico->save();

        $conc_juridico2 = new Conc_juridicos();
        $conc_juridico2->des_conc_juridicos = "No viable";
        $conc_juridico2->save();
    }
}
