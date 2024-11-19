<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Titulacion extends Model
{
    protected $fillable = [
        'nro_acta',
        'nro_red1',
        'nro_red2',
        'titulando1',
        'titulando2',
        'promocion',
        'programa_id',
        'hora_inicio',
        'hora_fin',
        'fecha_titulacion',
        'nota_titulando1',
        'nota_titulando1',
        'nombre_proyecto',
        'jurado1',
        'jurado2',
        'presidente',
    ];

    public function programa()
    {
        return $this->belongsTo(Programa::class, 'programa_id');
    }

    public function docente()
    {
        return $this->belongsTo(Docente::class, 'jurado1','jurado2','presidente');
    }
}
