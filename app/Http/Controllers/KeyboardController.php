<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keyboard;

class KeyboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keyboards = Keyboard::paginate(5);
        return view('keyboards.index', compact('keyboards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('keyboards.create');
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
            'connection_type' => 'required',
            'status' => 'required',
            'location' => 'required',
        ]);

        $datosKeyboards = $request->except('_token');
        Keyboard::insert($datosKeyboards);
        return redirect('keyboards')->with('mensaje', 'keyboard agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $keyboard = Keyboard::find($id);
        return view('keyboards.show', compact('keyboard'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $keyboards = Keyboard::find($id);
        return view('keyboards.edit', compact('keyboards'));
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
            'connection_type' => 'required',
            'status' => 'required',
            'location' => 'required',
        ]);

        $datosKeyboards = $request->except(['_token', '_method']);
        Keyboard::where('id', $id)->update($datosKeyboards);
        $keyboards = Keyboard::findOrFail($id);
        return view('keyboards.edit', compact('keyboards'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $keyboard = Keyboard::find($id);
        $keyboard->delete();
        return redirect('keyboards')->with('mensaje', 'keyboard borrado');
    }
}
