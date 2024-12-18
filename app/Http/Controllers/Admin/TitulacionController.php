<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Titulacion;
use Illuminate\Http\Request;

class TitulacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.titulacion.index');
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
            'nro_acta' => 'required',
            'nro_rd1' => 'required',
            'nro_rd2' => 'required',
            'titulando1' => 'required',
            'titulando2' => 'required',
            'promocion' => 'required',
            'programa_id' => 'required|exists:programas,id',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
            'fecha_titulacion' => 'required',
            'nota_titulando1' => 'required',
            'nota_titulando2' => 'required',
            'nombre_proyecto' => 'required',
            'jurado1'=>'required|exists:docentes,id',
            'jurado2'=>'required|exists:docentes,id',
            'presidente'=>'required|exists:docentes,id',
        ]);
        $titulaciones = new Titulacion();
        $titulaciones->nro_acta = $validatedData['nro_acta'];
        $titulaciones->nro_rd1 = $validatedData['nro_rd1'];
        $titulaciones->nro_rd2 = $validatedData['nro_rd2'];
        $titulaciones->titulando1 = $validatedData['titulando1'];
        $titulaciones->titulando2 = $validatedData['titulando2'];
        $titulaciones->promocion = $validatedData['promocion'];
        $titulaciones->programa_id = $validatedData['programa_id'];
        $titulaciones->hora_inicio = $validatedData['hora_inicio'];
        $titulaciones->hora_fin = $validatedData['hora_fin'];
        $titulaciones->fecha_titulacion = $validatedData['fecha_titulacion'];
        $titulaciones->nota_titulando1 = $validatedData['nota_titulando1'];
        $titulaciones->nota_titulando2 = $validatedData['nota_titulando2'];
        $titulaciones->nombre_proyecto = $validatedData['nombre_proyecto'];
        $titulaciones->jurado1 = $validatedData['jurado1'];
        $titulaciones->jurado2 = $validatedData['jurado2'];
        $titulaciones->presidente = $validatedData['presidente'];
        $titulaciones->save();
        if ($titulaciones){
            return redirect()->route('admin.titulacion.index')->with('success', 'El titulacione fue registrado correctamente.');
        } else {
            return redirect()->back()->withErrors('No se registro correctamente el titulacione:' . $titulaciones->getMessage());
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
            'nro_acta' => 'required',
            'nro_rd1' => 'required',
            'nro_rd2' => 'required',
            'titulando1' => 'required',
            'titulando2' => 'required',
            'promocion' => 'required',
            'programa_id' => 'required|exists:programas,id',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
            'fecha_titulacion' => 'required',
            'nota_titulando1' => 'required',
            'nota_titulando2' => 'required',
            'nombre_proyecto' => 'required',
            'jurado1'=>'required|exists:docentes,id',
            'jurado2'=>'required|exists:docentes,id',
            'presidente'=>'required|exists:docentes,id',
        ]);
        $titulaciones = Titulacion::findOrFail($id);
        $titulaciones->nro_acta = $validateData['nro_acta'];
        $titulaciones->nro_rd1 = $validateData['nro_rd1'];
        $titulaciones->nro_rd2 = $validateData['nro_rd2'];
        $titulaciones->titulando1 = $validateData['titulando1'];
        $titulaciones->titulando2 = $validateData['titulando2'];
        $titulaciones->promocion = $validateData['promocion'];
        $titulaciones->programa_id = $validateData['programa_id'];
        $titulaciones->hora_inicio = $validateData['hora_inicio'];
        $titulaciones->hora_fin = $validateData['hora_fin'];
        $titulaciones->fecha_titulacion = $validateData['fecha_titulacion'];
        $titulaciones->nota_titulando1 = $validateData['nota_titulando1'];
        $titulaciones->nota_titulando2 = $validateData['nota_titulando2'];
        $titulaciones->nombre_proyecto = $validateData['nombre_proyecto'];
        $titulaciones->jurado1 = $validateData['jurado1'];
        $titulaciones->jurado2 = $validateData['jurado2'];
        $titulaciones->presidente = $validateData['presidente'];
        $titulaciones->save();
        if ($titulaciones){
            return redirect()->route('admin.titulacion.index')->with('success', 'El titulacione fue actualizado correctamente.');
        } else {
            return redirect()->back()->withErrors('No se actualizo correctamente el titulacione:' . $titulaciones->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Titulacion::find($id)->delete();
        return redirect()->route('admin.titulacion.index')->with('success', 'La titulación fue eliminada correctamente.');
    }
}
