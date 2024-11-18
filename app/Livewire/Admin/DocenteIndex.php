<?php

namespace App\Livewire\Admin;

use App\Models\Docente;
use Livewire\Component;

class DocenteIndex extends Component
{
    public function render()
    {
        $docente = Docente::all();
        return view('livewire.admin.docente-index', compact('docente'));
    }
}
