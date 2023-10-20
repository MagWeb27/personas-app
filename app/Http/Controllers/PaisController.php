<?php

namespace App\Http\Controllers;

use App\Models\Pais;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pais = Pais::all();
        return view('paises.index', ['pais' => $pais]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departamentos = DB::table('tb_departamento')
            ->orderBy('depa_nomb')
            ->get();
        return view('paises.create', ['departamentos' => $departamentos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Pais::create([
            'pais_codi' => $request->codigo,
            'pais_nomb' => $request->name,
            'pais_capi' => $request->capital,
            'depa_codi' => $request->departamento
        ]);

        session()->flash('mensaje', 'Se ha creado un nuevo registro correctamente.');
        return redirect()->route('paises.index');
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
    public function edit($pais_codi)
    {
        $pais = Pais::find($pais_codi);
        $departamentos = DB::table('tb_departamento')
            ->orderBy('depa_nomb')
            ->get();
        return view('paises.edit', ['pais' => $pais, 'departamentos' => $departamentos]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $pais_codi)
    {
        $pais = pais::find($pais_codi);
        $pais->pais_nomb = $request->name;
        $pais->pais_codi = $request->codigo;
        $pais->pais_capi = $request->capital;
        $pais->save();

        $pais = DB::table('tb_pais')
            ->join('tb_departamento', 'tb_pais.pais_codi', '=', 'tb_pais.pais_codi')
            ->select('tb_pais.*', 'tb_departamento.depa_nomb')
            ->get();
        session()->flash('mensaje', 'El campo se actualizo correctamente.');
        return view('paises.index', ['pais' => $pais]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
