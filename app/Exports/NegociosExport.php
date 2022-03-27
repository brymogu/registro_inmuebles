<?php

namespace App\Exports;

use App\Models\Negocios;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class NegociosExport implements FromCollection, WithHeadings
{
    protected $request;
    public function __construct($request)
    {
        $this->request = $request;
    }


    public function headings(): array
    {
        return [
            'Fecha de creación',
            'Nombre',
            'Apellido',
            'Tipo documento',
            'Número',
            'Correo',
            'Teléfono',
            'Paso',
            'Tipo de Negocio',
            'Plan',
            'Valor',
            'Concepto de precio',
            'Precio contrato',
            'Concepto jurídico',
            'Observación',
            'Asesor',
            'Tipo de inmueble',
            'Es el propietario',
            'Por qué solicita',
            'Propiedad horizontal',
            'Arrendado',
            'Estrato',
            'Ciudad',
            'Dirección',
            'Complemento',
            'Tiempo de inmueble',
            'Longitud',
            'Latitud',
            'Estado',
            'Remodelado',
            'Tuberia',
            'Piso',
            'Ascensor',
            'Area Construida',
            'Area privada',
            'Area de terreno',
            'Material Habitaciones',
            'Marerial Cocina',
            'Material Baño',
            'Material Zona Social',
            'Nivel',
            'Número habitaciones',
            'Número baños',
            'Tiene garaje',
            'Número garajes',
            'Tipo Garajes',
            'Garaje cubierto',
            'Mobiliario cocina',
            'Tipo estufa',
            'Tipo horno',
            'Tipo Cocina',
            'Tipo Calentador',
            'Tipo vista',
            'Zona social',
            'Material Fachada',
            'Terraza',
            'Area terraza',
            'Chimenea',
            'Balcon',
            'Area balcon',
            'Baño servicio',
            'Baños social',
            'Estudio',
            'Depósito',
            'Hab. servicio',
            'Star',
            'Zona lavanderia',
            'Patio',
            'Entrega cortinas',
            'Piscina privada',
            'Sauna privado',
            'Turco provado',
            'Jacuzzi Privado',
            'Tina privada',
            'Aire privado',
            'Calefacción privada',
            'Tipo vigilancia',
            'Tipo seguridad',
            'Nombre conjunto',
            'Tipo Cuota',
            'Cuota plena',
            'Cuota con descuento',
            'Parqueadero visitantes',
            'Bicicletero',
            'Zona social',
            'BBQ',
            'Sala juntas',
            'Parque infantil',
            'Gimnasio',
            'Turco',
            'Sauna',
            'Cancha squash',
            'Cancha tenis',
            'Cancha multiple',
            'Salón de juegos',
            'Salón de estudio',
            'Lavanderia',
            'Planta eléctrica',
            'Habitado',
            'Piscina',
            'Número Ascensores',
            'Jardín interior',
            'Chip',
            'Matricula',
            'Barrio Catastral',
            'Upz',
            'Localidad'
        ];
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {



        return collect(Negocios::obtenernegocios($this->request->f_inicio, $this->request->f_final));
    }
}
