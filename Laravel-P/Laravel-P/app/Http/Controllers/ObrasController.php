<?php

namespace App\Http\Controllers;

use App\Models\Obras;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ObrasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function mapa()
    {
        return view('obras.mapa');
    } 

    public function lista(){
        $obras = Obras::paginate(10);
        return view('obras.lista', compact('obras'));
    }

    public function participa()
    {
        return view('obras.participa');
    } 
    public function dashboard()
{
    $terminadas = Obras::where('estatus', 'Finalizada')->count();
    $enProceso = Obras::where('estatus', 'En proceso')->count();
    $planeadas = Obras::where('estatus', 'Planeada')->count();
    $inversionTotal = Obras::sum('presupuesto');

    return view('dashboard', compact('terminadas', 'enProceso', 'planeadas', 'inversionTotal'));
}

    
    public function index()
    {
        $obras = Obras::all(); 
        return view('obras.lista', compact('obras'));
        //return view('lista', compact('obras'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('obras.alta');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
        'tipo_obra' => 'required|string',
        'descripcion' => 'nullable|string',
        'localidad' => 'required|string',
        'latitud' => 'required|numeric',
        'longitud' => 'required|numeric',
        'año' => 'nullable|integer|min:1900|max:' . date('Y'),
        'presupuesto' => 'nullable|numeric',
        'contratista' => 'nullable|string',
        'fecha_inicio' => 'nullable|date',
        'fecha_fin' => 'nullable|date',
    ]);

    Obras::create([
        'nombre' => $request->nombre,
        'tipo_obra' => $request->tipo_obra,
        'descripcion' => $request->descripcion,
        'localidad' => $request->localidad,
        'latitud' => $request->latitud,
        'longitud' => $request->longitud,
        'año' => $request->año,
        'presupuesto' => $request->presupuesto,
        'contratista' => $request->contratista,
        'fecha_inicio' => $request->fecha_inicio,
        'fecha_fin' => $request->fecha_fin,
        'usuario_creador' => auth()->user()->id_usuario, 
    ]);

    return redirect()->route('obras.index')->with('success', 'Obra registrada exitosamente.');
}



    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $obra = Obras::with('creador')->findOrFail($id);
        return view('obras.show', compact('obra'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $obra = Obras::findOrFail($id);
        return view('obras.edit', compact('obra'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo_obra' => 'required|string',
            'descripcion' => 'nullable|string',
            'localidad' => 'required|string',
            'latitud' => 'required|numeric',
            'longitud' => 'required|numeric',
            'año' => 'nullable|integer|min:1900|max:' . date('Y'),
            'presupuesto' => 'nullable|numeric',
            'contratista' => 'nullable|string',
            'fecha_inicio' => 'nullable|date',
            'fecha_fin' => 'nullable|date',
            'estatus' => 'required|string',
        ]);

        $obra = Obras::findOrFail($id);
        $obra->update($request->all());

        return redirect()->route('obras.index')->with('success', 'Obra actualizada correctamente.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $obra = Obras::findOrFail($id);
        $obra->delete();

        return redirect()->route('obras.index')->with('success', 'Obra eliminada correctamente.');
    }

    

    private function geocodeAddress($address)
    {
        $apiKey = env('GOOGLE_MAPS_API_KEY');
        $url = "https://maps.googleapis.com/maps/api/geocode/json";

        $response = Http::get($url, [
            'address' => $address,
            'key' => $apiKey
        ]);

        $data = $response->json();

        if (!empty($data['results'][0])) {
            return [
                'lat' => $data['results'][0]['geometry']['location']['lat'],
                'lng' => $data['results'][0]['geometry']['location']['lng']
            ];
        }

        return null;
    }
}
