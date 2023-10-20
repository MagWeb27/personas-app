<?php

namespace App\Http\Controllers;

use App\Models\Comuna;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ComunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comunas = Comuna::all();
        return view('comunas.index', ['comunas' => $comunas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $municipios = DB::table('tb_municipio')
            ->orderBy('muni_nomb')
            ->get();
        return view('comunas.create', ['municipios' => $municipios]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        Comuna::create([
            'comu_nomb' => $request->name,
            'muni_codi' => $request->municipio
        ]);

        session()->flash('mensaje', 'Se ha creado un nuevo registro correctamente.');
        return redirect()->route('comunascrud');
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
    public function edit($comu_codi)
    {
        $comuna = Comuna::find($comu_codi);
        $municipios = DB::table('tb_municipio')
            ->orderBy('muni_nomb')
            ->get();
        return view('comunas.edit', ['comuna' => $comuna, 'municipios' => $municipios]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $comu_codi)
    {
        $comuna = Comuna::find($comu_codi);
        $comuna->comu_nomb = $request->name;
        $comuna->comu_codi = $request->comuna;
        $comuna->muni_codi = $request->municipio;
        $comuna->save();

        $comunas = DB::table('tb_comuna')
            ->join('tb_municipio', 'tb_comuna.muni_codi', '=', 'tb_municipio.muni_codi')
            ->select('tb_comuna.*', 'tb_municipio.muni_nomb')
            ->get();

        session()->flash('mensaje', 'El campo se actualizo correctamente.');
        return view('comunas.index', ['comunas' => $comunas]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($comu_codi)
    {
        $comuna = Comuna::find($comu_codi);
        $comuna->delete();

        $comunas = DB::table('tb_comuna')
            ->join('tb_municipio', 'tb_comuna.muni_codi', '=', 'tb_municipio.muni_codi')
            ->select('tb_comuna.*', 'tb_municipio.muni_nomb')
            ->get();
            
        session()->flash('mensaje', 'El campo se eliminó correctamente.');
        return view('comunas.index', ['comunas' => $comunas]);
    }
}
