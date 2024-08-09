<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jugador extends Model
{
    use HasFactory;

    protected $fillable = ['equipo_id', 'nombre', 'numero', 'posicion'];

    protected $table = 'jugadores';

    public $timestamps = false; // Deshabilita el manejo automático de timestamps

    public function equipo()
    {
        return $this->belongsTo(Equipo::class);
    }
}

