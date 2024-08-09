<?php



use App\Http\Controllers\EquipoController;
use App\Http\Controllers\JugadorController;
use App\Http\Controllers\PartidoController;
use App\Http\Controllers\ResultadoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('api')->group(function () {
    Route::apiResource('equipos', EquipoController::class);
    Route::apiResource('jugadores', JugadorController::class);
    Route::apiResource('partidos', PartidoController::class);
    Route::apiResource('resultados', ResultadoController::class);
    Route::get('equipos/{equipo_id}/jugadores', [JugadorController::class, 'getPlayersByTeam']);
    //Route::get('equipos/{equipo_id}/partidos', [PartidoController::class, 'getMatchesByTeam']);
    Route::get('partidos/{partido_id}/resultado', [ResultadoController::class, 'getResultByMatch']);
    Route::get('equipos/{equipo_id}/jugadores/posicion/{posicion}', [JugadorController::class, 'getPlayersByPosition']);
    Route::get('partidos/equipos/{equipo1_id}/{equipo2_id}', [PartidoController::class, 'getMatchHistoryBetweenTeams']);
    Route::get('equipos/{equipo_id}/goles', [EquipoController::class, 'getTotalGoals']);
    Route::get('equipos/{equipo_id}/partidos-ganados', [EquipoController::class, 'getTotalWins']);
    Route::get('equipos/{equipo_id}/historial-resultados', [EquipoController::class, 'getMatchHistory']);
    Route::get('jugadores/{id}/detalles', [JugadorController::class, 'getPlayerDetails']);
    Route::get('equipos/{equipo_id}/proximo-partido', [EquipoController::class, 'getNextMatch']);
    Route::get('jugadores-con-equipos', [JugadorController::class, 'getJugadoresConEquipos']);
    Route::get('partidos/{id}/detalles', [PartidoController::class, 'getPartidoDetalles']);
    Route::get('equipos/{equipo_id}/partidos', [PartidoController::class, 'getPartidosPorEquipo']);
    Route::get('equipos/{equipo_id}/resultados', [ResultadoController::class, 'getResultadosPorEquipo']);
    
    });
