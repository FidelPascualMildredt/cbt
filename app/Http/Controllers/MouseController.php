<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mouse;

class MouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mouses = Mouse::paginate(5);
        return view('mouses.index', compact('mouses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mouses.create');
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

        $datosMouses = $request->except('_token');
        Mouse::insert($datosMouses);
        return redirect('mouses')->with('mensaje', 'Mouse agregado con éxito');
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
        $mouse = Mouse::find($id);
        return view('mouses.show', compact('mouse'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mouses = Mouse::find($id);
        return view('mouses.edit', compact('mouses'));
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

        $datosMouses = $request->except(['_token', '_method']);
        Mouse::where('id', $id)->update($datosMouses);
        $mouses = Mouse::findOrFail($id);
        return view('mouses.edit', compact('mouses'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mouse = Mouse::find($id);
        $mouse->delete();
        return redirect('mouses')->with('mensaje', 'Mouse borrado');
    }

}
