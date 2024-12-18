<?php

namespace App\Livewire\Admin;

use App\Models\Docente;
use App\Models\Programa;
use App\Models\Titulacion;
use Livewire\Component;

class TitulacionIndex extends Component
{
    public function render()
    {
        $titulacion=Titulacion::all();
        $programa=Programa::all();
        $jurado1=Docente::all();
        $jurado2=Docente::all();
        $presidente=Docente::all();
        return view('livewire.admin.titulacion-index', compact('titulacion','programa','jurado1','jurado2','presidente'));
    }

    public function programa()
    {
        return $this->belongsTo(Programa::class, 'categoria_id');
    }

    // public function jurado1()
    // {
    //     return $this->belongsTo(Docente::class, 'jurado1');
    // }

    // public function jurado2()
    // {
    //     return $this->belongsTo(Docente::class, 'jurado2');
    // }

    // public function presidente()
    // {
    //     return $this->belongsTo(Docente::class, 'presidente');
    // }
}

