<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resultado;
use App\Models\Partido;


class ResultadoController extends Controller
{
    public function index()
    {
        return Resultado::all();
    }

    public function show($id)
    {
        return Resultado::find($id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'partido_id' => 'required|exists:partidos,id',
            'puntaje_equipo_local' => 'required|integer',
            'puntaje_equipo_visitante' => 'required|integer',
        ]);

        $resultado = Resultado::create($request->all());
        return response()->json($resultado, 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'partido_id' => 'required|exists:partidos,id',
            'puntaje_equipo_local' => 'required|integer',
            'puntaje_equipo_visitante' => 'required|integer',
        ]);

        $resultado = Resultado::findOrFail($id);
        $resultado->update($request->all());
        return response()->json($resultado, 200);
    }

    public function destroy($id)
    {
        Resultado::findOrFail($id)->delete();
        return response()->json(null, 204);
    }

    public function getResultByMatch($partido_id)
    {
        $resultado = Resultado::where('partido_id', $partido_id)->first();
        return response()->json($resultado);
    }

    public function getResultadosPorEquipo($equipo_id)
    {
        $resultados = Partido::select(
            'partidos.id as partido_id',
            'e_local.nombre as equipo_local',
            'e_visitante.nombre as equipo_visitante',
            'partidos.fecha_partido',
            'resultados.puntaje_equipo_local',
            'resultados.puntaje_equipo_visitante'
        )
        ->join('equipos as e_local', 'partidos.equipo_local_id', '=', 'e_local.id')
        ->join('equipos as e_visitante', 'partidos.equipo_visitante_id', '=', 'e_visitante.id')
        ->join('resultados', 'partidos.id', '=', 'resultados.partido_id')
        ->where('partidos.equipo_local_id', $equipo_id)
        ->orWhere('partidos.equipo_visitante_id', $equipo_id)
        ->get();

        return response()->json($resultados);
    }
}

