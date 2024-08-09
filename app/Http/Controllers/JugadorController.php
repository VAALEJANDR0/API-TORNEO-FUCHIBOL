<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jugador;

class JugadorController extends Controller
{
    public function index()
    {
        return Jugador::all();
    }

    public function show($id)
    {
        return Jugador::find($id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'equipo_id' => 'required|exists:equipos,id',
            'nombre' => 'required|string|max:255',
            'numero' => 'required|integer',
            'posicion' => 'required|string|max:50',
        ]);

        $jugador = Jugador::create($request->all());
        return response()->json($jugador, 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'equipo_id' => 'required|exists:equipos,id',
            'nombre' => 'required|string|max:255',
            'numero' => 'required|integer',
            'posicion' => 'required|string|max:50',
        ]);

        $jugador = Jugador::findOrFail($id);
        $jugador->update($request->all());
        return response()->json($jugador, 200);
    }

    public function destroy($id)
    {
        Jugador::findOrFail($id)->delete();
        return response()->json(null, 204);
    }

    public function getPlayersByTeam($equipo_id)
    {
        $jugadores = Jugador::where('equipo_id', $equipo_id)->get();
        return response()->json($jugadores);
    }

    public function getPlayersByPosition($equipo_id, $posicion)
    {
        $jugadores = Jugador::where('equipo_id', $equipo_id)
                            ->where('posicion', $posicion)
                            ->get();
        return response()->json($jugadores);
    }

    public function getPlayerDetails($id)
    {
        $jugador = Jugador::with('equipo')->find($id);
        return response()->json($jugador);
    }

    public function getJugadoresConEquipos()
    {
        $jugadores = Jugador::select('jugadores.nombre as jugador', 'jugadores.numero', 'jugadores.posicion', 'equipos.nombre as equipo')
            ->join('equipos', 'jugadores.equipo_id', '=', 'equipos.id')
            ->get();

        return response()->json($jugadores);
    }


}
