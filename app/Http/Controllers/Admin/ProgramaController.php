<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Programa;
use Illuminate\Http\Request;

class ProgramaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.programa.index');
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
            'nombre_programa' => 'required',
            'abreviatura'=>'required',
        ]);
        $programas = new Programa();
        $programas->nombre_programa = $validatedData['nombre_programa'];
        $programas->abreviatura = $validatedData['abreviatura'];
        $programas->save();
        if ($programas){
            return redirect()->route('admin.programa.index')->with('success', 'El programa fue registrado correctamente.');
        } else {
            return redirect()->back()->withErrors('No se registro correctamente el programa:' . $programas->getMessage());
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
        $validatedData = $request->validate([
            'nombre_programa' => 'required',
            'abreviatura' => 'required',
        ]);

        $programas = Programa::findOrFail($id);

        $programas->nombre_programa = $validatedData['nombre_programa'];
        $programas->abreviatura = $validatedData['abreviatura'];
        $programas->save();

        if ($programas){
            return redirect()->route('admin.programa.index')->with('success', 'El fue actualizado correctamente.');
        } else {
            return redirect()->back()->withErrors('No se actualizo correctamente el:' . $programas->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Programa::find($id)->delete();
        return redirect()->route('admin.programa.index')->with('success', 'El programa fue eliminado correctamente.');
    }

    public function search(Request $request)
    {
        $query = $request->get('query');
        $programas = Programa::where('nombre_programa', 'like', "%$query%")
                    ->orWhere('abreviatura', 'like', "%$query%")
                    ->get();
        $output = '';
        foreach ($programas as $programa) {
            $nombreCompleto =$programa->abreviatura." :".$programa->nombre_programa;
            $output .= '<a href="#" class="list-group-item list-group-item-action programa-sugerencia" 
                        data-id="' . $programa->id . '" 
                        data-nombre_programa="' . $nombreCompleto . '"
                        data-abreviatura="' . $nombreCompleto . '">'
                        . $nombreCompleto . '</a>';
        }
        return response()->json($output);
    }
}
