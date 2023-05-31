<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Monitor;

class MonitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $monitors = Monitor::paginate(5);
        return view('monitors.index', compact('monitors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('monitors.create');
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
            'screen_type'=> 'required',
            'location' => 'required',
        ]);

        $datosMonitors = $request->except('_token');
        Monitor::insert($datosMonitors);
        return redirect('monitors')->with('mensaje', 'Monitor agregado con éxito');
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
        $monitor = Monitor::find($id);
        return view('monitors.show', compact('monitor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $monitors = Monitor::find($id);
        return view('monitors.edit', compact('monitors'));
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
            'screen_type'=> 'required',
            'location' => 'required',
        ]);

        $datosMonitors = $request->except(['_token', '_method']);
        Monitor::where('id', $id)->update($datosMonitors);
        $monitors = Monitor::findOrFail($id);
        return view('monitors.edit', compact('monitors'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $monitor = Monitor::find($id);
        $monitor->delete();
        return redirect('monitors')->with('mensaje', 'Monitor borrado');
    }
}
