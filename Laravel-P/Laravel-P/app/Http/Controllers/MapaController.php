<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class MapaController extends Controller
{
    public function index()
    {
        // Ejemplo: obtener coordenadas desde una tabla "escuelas"
        $escuelas = DB::table('escuelas_ayalas')
            ->whereNotNull('latitud')
            ->whereNotNull('longitud')
            ->where('latitud', '!=', 0)
            ->where('longitud', '!=', 0)
            ->get();

        return view('mapa', compact('escuelas'));
    }
}
