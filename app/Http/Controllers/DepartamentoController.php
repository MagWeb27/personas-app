<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departamentos = Departamento::all();
        return view('departamentos.index', ['departamentos' => $departamentos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pais = DB::table('tb_pais')
            ->orderBy('pais_nomb')
            ->get();
        return view('departamentos.create', ['pais' => $pais]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Departamento::create([
            'depa_nomb' => $request->name,
            'pais_codi' =>$request->pais
        ]);

        session()->flash('mensaje', 'Se ha creado un nuevo registro correctamente.');
        return redirect()->route('departamentos.index');
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
    public function edit($depa_codi)
    {
        $departamento = Departamento::find($depa_codi);
        $pais = DB::table('tb_pais')
            ->orderBy('pais_nomb')
            ->get();
        return view('departamentos.edit', ['departamento' => $departamento, 'pais' => $pais]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $depa_codi)
    {
        $departamento = departamento::find($depa_codi);
        $departamento->depa_nomb = $request->name;
        $departamento->depa_codi = $request->departamento;
        $departamento->pais_codi = $request->pais;
        $departamento->save();

        $departamentos = DB::table('tb_departamento')
            ->join('tb_pais', 'tb_departamento.pais_codi', '=', 'tb_pais.pais_codi')
            ->select('tb_departamento.*', 'tb_pais.pais_nomb')
            ->get();
        session()->flash('mensaje', 'El campo se actualizo correctamente.');
        return view('departamentos.index', ['departamentos' => $departamentos]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($depa_codi)
    {
        $departamento = Departamento::find($depa_codi);
        $departamento->delete();

        $departamentos = DB::table('tb_departamento')
            ->join('tb_pais', 'tb_departamento.pais_codi', '=', 'tb_pais.pais_codi')
            ->select('tb_departamento.*', 'tb_pais.pais_nomb')
            ->get();
        session()->flash('mensaje', 'El campo se elimino correctamente.');
        return view('departamentos.index', ['departamentos' => $departamentos]);
    }
}
