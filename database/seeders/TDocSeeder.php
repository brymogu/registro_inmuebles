<?php

namespace Database\Seeders;

use App\Models\Tipos_documento;
use Illuminate\Database\Seeder;

class TDocSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $documentos = new Tipos_documento();
        $documentos->desc_tipos_documento = "Cédula de ciudadanía";
        $documentos->desc_nombres_corto = "CC";
        $documentos->save();

        $documentos2 = new Tipos_documento();
        $documentos2->desc_tipos_documento = "Cédula de extranjería";
        $documentos2->desc_nombres_corto = "CE";
        $documentos2->save();

        $documentos3 = new Tipos_documento();
        $documentos3->desc_tipos_documento = "Número de identificación tributaria";
        $documentos3->desc_nombres_corto = "NIT";
        $documentos3->save();

        $documentos4 = new Tipos_documento();
        $documentos4->desc_tipos_documento = "Pasaporte";
        $documentos4->desc_nombres_corto = "PSP";
        $documentos4->save();
    }
}
