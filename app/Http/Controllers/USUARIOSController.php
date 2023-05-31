<?php

namespace App\Http\Controllers;

use App\Models\USUARIOS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class USUARIOSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['usuarios']=USUARIOS::paginate(5);
        return view('usuarios.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //$datosUsuarios = request()->all();
        $datosUsuarios = request()->except('_token');

        if($request->hasFile('Foto')){
            $datosUsuarios['Foto']=$request->file('Foto')->store('uploads','public');
        }

        Usuarios::insert($datosUsuarios);
       // return response()->json($datosUsuarios);
       return redirect('usuarios')->with('mensaje','Usuario agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\USUARIOS  $uSUARIOS
     * @return \Illuminate\Http\Response
     */
    public function show(USUARIOS $uSUARIOS)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\USUARIOS  $uSUARIOS
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $usuarios=USUARIOS::findOrFail($id);
        return view('usuarios.edit',compact('usuarios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\USUARIOS  $uSUARIOS
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datosUsuarios = request()->except(['_token','_method']);

        if($request->hasFile('Foto')){
            $usuarios=USUARIOS::findOrFail($id);
            Storage::delete('public/'.$usuarios->Foto);
            $datosUsuarios['Foto']=$request->file('Foto')->store('uploads','public');
        }

        USUARIOS::where('id','=',$id)->update($datosUsuarios);
        $usuarios=USUARIOS::findOrFail($id);
        return view('usuarios.edit',compact('usuarios'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\USUARIOS  $uSUARIOS
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $usuarios=USUARIOS::findOrFail($id);

        if(Storage::delete('public/'.$usuarios->Foto)){
            USUARIOS::destroy($id);
        }

        
        return redirect('usuarios')->with('mensaje','Usuario Borrado');
    }
}
