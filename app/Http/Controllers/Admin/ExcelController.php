<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\NegociosExport;
use Excel;

class ExcelController extends Controller
{
    //
    public function descargar(Request $request)
    {
        return Excel::download(new NegociosExport,'consignaciones.xlsx');
    }    
}
