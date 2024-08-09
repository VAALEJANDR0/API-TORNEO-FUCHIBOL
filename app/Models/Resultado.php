<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resultado extends Model
{
    use HasFactory;

    protected $fillable = ['partido_id', 'puntaje_equipo_local', 'puntaje_equipo_visitante'];

    protected $table = 'resultados';

    public $timestamps = false; // Deshabilita el manejo automático de timestamps

    public function partido()
    {
        return $this->belongsTo(Partido::class);
    }
}


