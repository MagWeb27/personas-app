<?php

namespace App\Http\Controllers;

use App\Models\Municipio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MunicipioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $municipios = Municipio::all();
        return view('municipios.index', ['municipios' => $municipios]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departamentos = DB::table('tb_departamento')
            ->orderBy('depa_nomb')
            ->get();
        return view('municipios.create', ['departamentos' => $departamentos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Municipio::create([
            'muni_nomb' => $request->name,
            'depa_codi' =>$request->departamento
        ]);

        session()->flash('mensaje', 'Se ha creado un nuevo registro correctamente.');
        return redirect()->route('municipios.index');
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
    public function edit($muni_codi)
    {
        $municipio = Municipio::find($muni_codi);
        $departamentos = DB::table('tb_departamento')
            ->orderBy('depa_nomb')
            ->get();
        return view('municipios.edit', ['municipio' => $municipio, 'departamentos' => $departamentos]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $muni_codi)
    {
        $municipio = municipio::find($muni_codi);
        $municipio->muni_nomb = $request->name;
        $municipio->muni_codi = $request->municipio;
        $municipio->depa_codi = $request->departamento;
        $municipio->save();

        $municipios = DB::table('tb_municipio')
            ->join('tb_departamento', 'tb_municipio.depa_codi', '=', 'tb_departamento.depa_codi')
            ->select('tb_municipio.*', 'tb_departamento.depa_nomb')
            ->get();
        session()->flash('mensaje', 'El campo se actualizo correctamente.');
        return view('municipios.index', ['municipios' => $municipios]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($muni_codi)
    {
        $municipio = Municipio::find($muni_codi);
        $municipio->delete();

        $municipios = DB::table('tb_municipio')
            ->join('tb_departamento', 'tb_municipio.depa_codi', '=', 'tb_departamento.depa_codi')
            ->select('tb_municipio.*', 'tb_departamento.depa_nomb')
            ->get();
        session()->flash('mensaje', 'El campo se elimino correctamente.');
        return view('municipios.index', ['municipios' => $municipios]);
    }
}
