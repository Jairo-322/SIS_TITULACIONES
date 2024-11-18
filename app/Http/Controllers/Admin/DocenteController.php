<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Docente;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;

class DocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.docente.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'dni' => 'required',
            'nombres' => 'required',
            'apellidos' => 'required',
        ]);
    
        try {
            $docentes = new Docente();
            $docentes->dni = $validatedData['dni'];
            $docentes->nombres = $validatedData['nombres'];
            $docentes->apellidos = $validatedData['apellidos'];
            $docentes->save();
    
            return redirect()->route('admin.docente.index')->with('success', 'El docente fue registrado correctamente.');
        } catch (\Illuminate\Database\QueryException $e) {
            // Verifica si el error es por entrada duplicada
            if ($e->errorInfo[1] == 1062) {
                return redirect()->back()->withErrors('Error: El DNI ' . $validatedData['dni'] . ' ya está registrado en el sistema.');
            } else {
                // Otro error de la base de datos
                return redirect()->back()->withErrors('Error al registrar el docente: ' . $e->getMessage());
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([
            'dni'=>'required',
            'nombres'=>"required",
            'apellidos'=>'required',
        ]);
        $docentes = Docente::findOrFail($id);
        $docentes->dni = $validateData['dni'];
        $docentes->nombres = $validateData['nombres'];
        $docentes->apellidos = $validateData['apellidos'];
        $docentes->save();
        if ($docentes){
            return redirect()->route('admin.docente.index')->with('success', 'El docente fue actualizado correctamente.');
        } else {
            return redirect()->back()->withErrors('No se actualizo correctamente el docente:' . $docentes->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Docente::find($id)->delete();
        return redirect()->route('admin.docente.index')->with('success', 'El docente fue eliminado correctamente.');
    }

    public function search(Request $request)
    {
        $query = $request->get('query');
        $docentes = Docente::where('nombres', 'like', "%$query%")
                    ->orWhere('apellidos', 'like', "%$query%")
                    ->get();
        $output = '';
        foreach ($docentes as $docente) {
            $nombreCompleto =$docente->nombres." ".$docente->apellidos;
            $output .= '<a href="#" class="list-group-item list-group-item-action docente-sugerencia" 
                        data-id="' . $docente->id . '" 
                        data-nombres="' . $docente->nombres . '"
                        data-apellidos="' . $docente->apellidos . '">'
                        . $nombreCompleto . '</a>';
        }
        return response()->json($output);
    }
}
