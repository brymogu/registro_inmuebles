<?php

namespace App\Http\Controllers;

use App\Models\Propiedades;
use App\Models\Negocios;
use App\Models\Fotos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FotosController extends Controller
{
    public function show($id)
    {
        $Propiedad = Propiedades::find($id);
        return view('fotos', ['tipo' => $Propiedad->horizontal], ['id' => $id]);
    }

    public function store(Request $request, $id)
    {
        $imagenes = $request->file('file')->store('public/fotos/' . $id . '/');
        $url = Storage::url($imagenes);

        $fotos = new Fotos();        
        $fotos->url = $url;   
        $fotos->propiedad = $id;      
        $fotos->save();
    }
}
