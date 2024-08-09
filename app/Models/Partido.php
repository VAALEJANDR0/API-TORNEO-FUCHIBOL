<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partido extends Model
{
    use HasFactory;

    protected $fillable = ['equipo_local_id', 'equipo_visitante_id', 'fecha_partido'];

    protected $table = 'partidos';

    public $timestamps = false; // Deshabilita el manejo automático de timestamps

    public function equipoLocal()
    {
        return $this->belongsTo(Equipo::class, 'equipo_local_id');
    }

    public function equipoVisitante()
    {
        return $this->belongsTo(Equipo::class, 'equipo_visitante_id');
    }

    public function resultado()
    {
        return $this->hasOne(Resultado::class);
    }
}


