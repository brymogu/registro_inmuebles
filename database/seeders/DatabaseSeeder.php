<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(TDocSeeder::class);
        $this->call(EstadoInmuebleSeeder::class);
        $this->call(TiposNegocioSeeder::class);
        $this->call(PlanesSeeder::class);
        $this->call(TiposInmuebleSeeder::class);
        $this->call(MoPiCocinaSeeder::class);
        $this->call(MobCocinaSeeder::class);
        $this->call(EstufasSeeder::class);
        $this->call(HornosSeeder::class);
        $this->call(TpCocinaSeeder::class);
        $this->call(VigilanciaSeeder::class);
        $this->call(SeguridadSeeder::class);
        $this->call(TiposCuotaSeeder::class);
        $this->call(NoGarajesSeeder::class);
        $this->call(CalentadoresSeeder::class);
        $this->call(VistaSeeder::class);
        $this->call(FachadaSeeder::class);
        $this->call(MatPisoBanoSeeder::class);
        $this->call(ZsocialSeeder::class);
        $this->call(MatPisoHabSeeder::class);
        $this->call(MatPisoZsocialSeeder::class);
        $this->call(RemodeladoSeed::class);
        $this->call(EstratoSeeder::class);
        $this->call(NivelesSeeder::class);
        $this->call(UsuarioSeeder::class);
        $this->call(CuidadesyDepartamentos::class);
        $this->call(ConcJuridicosSeeder::class);
    }
}
