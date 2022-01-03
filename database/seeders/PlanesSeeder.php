<?php

namespace Database\Seeders;

use App\Models\Planes;
use Illuminate\Database\Seeder;

class PlanesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $plan = new Planes();
        $plan->desc_plan = "Básico";
        $plan->save();

        $plan2 = new Planes();
        $plan2->desc_plan = "Estándar";
        $plan2->save();

        $plan3 = new Planes();
        $plan3->desc_plan = "Premium";
        $plan3->save();

        $plan4 = new Planes();
        $plan4->desc_plan = "Rural/Forestta";
        $plan4->save();

    }
}
