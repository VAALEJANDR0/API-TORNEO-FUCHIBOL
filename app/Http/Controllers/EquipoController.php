<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipo;
use App\Models\Resultado;
use App\Models\Partido;



class EquipoController extends Controller
{
    public function index()
    {
        return Equipo::all();
    }

    public function show($id)
    {
        return Equipo::find($id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'entrenador' => 'nullable|string|max:255',
        ]);

        $equipo = Equipo::create($request->all());
        return response()->json($equipo, 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'entrenador' => 'nullable|string|max:255',
        ]);

        $equipo = Equipo::findOrFail($id);
        $equipo->update($request->all());
        return response()->json($equipo, 200);
    }

    public function destroy($id)
    {
        Equipo::findOrFail($id)->delete();
        return response()->json(null, 204);
    }

    public function getTotalGoals($equipo_id)
    {
        $golesLocal = Resultado::whereHas('partido', function ($query) use ($equipo_id) {
            $query->where('equipo_local_id', $equipo_id);
        })->sum('puntaje_equipo_local');

        $golesVisitante = Resultado::whereHas('partido', function ($query) use ($equipo_id) {
            $query->where('equipo_visitante_id', $equipo_id);
        })->sum('puntaje_equipo_visitante');

        $totalGoles = $golesLocal + $golesVisitante;

        return response()->json(['total_goles' => $totalGoles]);
    }

    public function getTotalWins($equipo_id)
    {
        $partidosGanadosComoLocal = Resultado::whereHas('partido', function ($query) use ($equipo_id) {
            $query->where('equipo_local_id', $equipo_id);
        })->whereColumn('puntaje_equipo_local', '>', 'puntaje_equipo_visitante')->count();

        $partidosGanadosComoVisitante = Resultado::whereHas('partido', function ($query) use ($equipo_id) {
            $query->where('equipo_visitante_id', $equipo_id);
        })->whereColumn('puntaje_equipo_visitante', '>', 'puntaje_equipo_local')->count();

        $totalPartidosGanados = $partidosGanadosComoLocal + $partidosGanadosComoVisitante;

        return response()->json(['total_partidos_ganados' => $totalPartidosGanados]);
    }

    public function getMatchHistory($equipo_id)
    {
        $partidosComoLocal = Resultado::whereHas('partido', function ($query) use ($equipo_id) {
            $query->where('equipo_local_id', $equipo_id);
        })->get();

        $partidosComoVisitante = Resultado::whereHas('partido', function ($query) use ($equipo_id) {
            $query->where('equipo_visitante_id', $equipo_id);
        })->get();

        $historial = $partidosComoLocal->merge($partidosComoVisitante);

        return response()->json($historial);
    }

    public function getNextMatch($equipo_id)
    {
        $proximoPartidoComoLocal = Partido::with('equipoLocal', 'equipoVisitante')
            ->where('equipo_local_id', $equipo_id)
            ->where('fecha_partido', '>', now())
            ->orderBy('fecha_partido')
            ->first();

        $proximoPartidoComoVisitante = Partido::with('equipoLocal', 'equipoVisitante')
            ->where('equipo_visitante_id', $equipo_id)
            ->where('fecha_partido', '>', now())
            ->orderBy('fecha_partido')
            ->first();

        if (!$proximoPartidoComoLocal && !$proximoPartidoComoVisitante) {
            return response()->json(['message' => 'No hay partidos próximos'], 404);
        }

        if (!$proximoPartidoComoLocal) {
            $partido = $proximoPartidoComoVisitante;
        } elseif (!$proximoPartidoComoVisitante) {
            $partido = $proximoPartidoComoLocal;
        } else {
            $partido = $proximoPartidoComoLocal->fecha_partido < $proximoPartidoComoVisitante->fecha_partido
                ? $proximoPartidoComoLocal
                : $proximoPartidoComoVisitante;
        }

        return response()->json([
            'id' => $partido->id,
            'fecha_partido' => $partido->fecha_partido,
            'equipo_local' => [
                'nombre' => $partido->equipoLocal->nombre,
            ],
            'equipo_visitante' => [
                'nombre' => $partido->equipoVisitante->nombre,
            ],
        ]);
    }




}
