<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ordenador;

class OrdenadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ordenadores = Ordenador::paginate(5);
        return view('ordenadores.index', compact('ordenadores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ordenadores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'serial_number' => 'required',
            'model' => 'required',
            'brand' => 'required',
            'ram' => 'required',
            'processor' => 'required',
            'hard_disk' => 'required',
            'network_connection' => 'required',
            'location' => 'required',
        ]);

        $datosOrdenadores = $request->except('_token');
        Ordenador::insert($datosOrdenadores);
        return redirect('ordenadores')->with('mensaje', 'Ordenador agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ordenador = Ordenador::find($id);
        return view('ordenadores.show', compact('ordenador'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ordenadores = Ordenador::find($id);
        return view('ordenadores.edit', compact('ordenadores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'serial_number' => 'required',
            'model' => 'required',
            'brand' => 'required',
            'ram' => 'required',
            'processor' => 'required',
            'hard_disk' => 'required',
            'network_connection' => 'required',
            'location' => 'required',
        ]);

        $datosOrdenadores = $request->except(['_token', '_method']);
        Ordenador::where('id', $id)->update($datosOrdenadores);
        $ordenadores = Ordenador::findOrFail($id);
        return view('ordenadores.edit', compact('ordenadores'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $ordenador = Ordenador::find($id);
        $ordenador->delete();
        return redirect('ordenadores')->with('mensaje', 'Ordenador borrado');
    }
}
