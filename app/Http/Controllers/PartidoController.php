<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partido;

class PartidoController extends Controller
{
    public function index()
    {
        return Partido::all();
    }

    public function show($id)
    {
        return Partido::find($id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'equipo_local_id' => 'required|exists:equipos,id',
            'equipo_visitante_id' => 'required|exists:equipos,id',
            'fecha_partido' => 'required|date',
        ]);

        $partido = Partido::create($request->all());
        return response()->json($partido, 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'equipo_local_id' => 'required|exists:equipos,id',
            'equipo_visitante_id' => 'required|exists:equipos,id',
            'fecha_partido' => 'required|date',
        ]);

        $partido = Partido::findOrFail($id);
        $partido->update($request->all());
        return response()->json($partido, 200);
    }

    public function destroy($id)
    {
        Partido::findOrFail($id)->delete();
        return response()->json(null, 204);
    }

    public function getMatchesByTeam($equipo_id)
    {
        $partidos = Partido::where('equipo_local_id', $equipo_id)
                           ->orWhere('equipo_visitante_id', $equipo_id)
                           ->get();
        return response()->json($partidos);
    }
    

    public function getMatchHistoryBetweenTeams($equipo1_id, $equipo2_id)
    {
        $partidos = Partido::where(function ($query) use ($equipo1_id, $equipo2_id) {
            $query->where('equipo_local_id', $equipo1_id)
                  ->where('equipo_visitante_id', $equipo2_id);
        })->orWhere(function ($query) use ($equipo1_id, $equipo2_id) {
            $query->where('equipo_local_id', $equipo2_id)
                  ->where('equipo_visitante_id', $equipo1_id);
        })->get();
    
        return response()->json($partidos);
    }

    public function getPartidoDetalles($id)
    {
        $partido = Partido::select(
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
        ->where('partidos.id', $id)
        ->first();

        if (!$partido) {
            return response()->json(['message' => 'Partido no encontrado'], 404);
        }

        return response()->json($partido);
    }

    public function getPartidosPorEquipo($equipo_id)
    {
        $partidos = Partido::select(
            'partidos.id as partido_id',
            'e_local.nombre as equipo_local',
            'e_visitante.nombre as equipo_visitante',
            'partidos.fecha_partido'
        )
        ->join('equipos as e_local', 'partidos.equipo_local_id', '=', 'e_local.id')
        ->join('equipos as e_visitante', 'partidos.equipo_visitante_id', '=', 'e_visitante.id')
        ->where('partidos.equipo_local_id', $equipo_id)
        ->orWhere('partidos.equipo_visitante_id', $equipo_id)
        ->get();

        return response()->json($partidos);
    }

}

