<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipment;
use App\Models\Keyboard;
use App\Models\Monitor;
use App\Models\Mouse;
use App\Models\Ordenador;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;




class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipments = Equipment::select(
            'equipments.id',
            'equipments.serial_number',
            'equipments.status',
            // 'equipments.QR',
            'keyboards.serial_number as keyboard_serial_number',
            'mouses.serial_number as mouse_serial_number',
            'monitors.serial_number as monitor_serial_number',
            'ordenadores.serial_number as ordenador_serial_number'
        )
            ->join('keyboards', 'keyboards.id', '=', 'equipments.keyboards_id')
            ->join('mouses', 'mouses.id', '=', 'equipments.mouses_id')
            ->join('monitors', 'monitors.id', '=', 'equipments.monitors_id')
            ->join('ordenadores', 'ordenadores.id', '=', 'equipments.ordenadores_id')
            // ->get();
            ->paginate(1);

        return view('equipments.index', compact('equipments'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mouses = Mouse::all('id', 'serial_number');
        $ordenadores = Ordenador::all('id', 'serial_number');
        $keyboards = Keyboard::all('id', 'serial_number');
        $monitors = Monitor::all('id', 'serial_number');

        return view('equipments.create', compact('mouses', 'ordenadores', 'keyboards', 'monitors'));
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
            'status' => 'required',

            // 'QR' => 'required',
            'mouses_id' => 'required',
            'ordenadores_id' => 'required',
            'keyboards_id' => 'required',
            'monitors_id' => 'required',
        ]);

        $equipmentData = $request->except('_token');
        Equipment::create($equipmentData);
        return redirect('equipments')->with('mensaje', 'Equipment agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $equipments = Equipment::select(
            'equipments.id',
            'equipments.serial_number',
            'equipments.status',
            // 'equipments.QR',
            'keyboards.serial_number as keyboard_serial_number',
            'mouses.serial_number as mouse_serial_number',
            'monitors.serial_number as monitor_serial_number',
            'ordenadores.serial_number as ordenador_serial_number'
        )
            ->join('keyboards', 'keyboards.id', '=', 'equipments.keyboards_id')
            ->join('mouses', 'mouses.id', '=', 'equipments.mouses_id')
            ->join('monitors', 'monitors.id', '=', 'equipments.monitors_id')
            ->join('ordenadores', 'ordenadores.id', '=', 'equipments.ordenadores_id')
            ->where('equipments.id', $id)
            ->first();

        return view('equipments.show', compact('equipments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mouses = Mouse::all('id', 'serial_number');
        $ordenadores = Ordenador::all('id', 'serial_number');
        $keyboards = Keyboard::all('id', 'serial_number');
        $monitors = Monitor::all('id', 'serial_number');
        $equipments = Equipment::find($id);
        return view('equipments.edit', compact('equipments', 'mouses', 'ordenadores', 'keyboards', 'monitors'));
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
            'status' => 'required',
            // 'QR' => 'required',
            'mouses_id' => 'required',
            'ordenadores_id' => 'required',
            'keyboards_id' => 'required',
            'monitors_id' => 'required',
        ]);

        $equipment = Equipment::findOrFail($id);
        $equipment->update($request->all());

        return redirect('equipments')->with('mensaje', 'Equipment actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $equipments = Equipment::findOrFail($id);
        $equipments->delete();
        return redirect('equipments')->with('mensaje', 'Equipment borrado');
    }
    //con este codigo imprimimos el pdf de las maquinas y se arregla el tamaño del PDF.
    public function generarPDF()
    {
        // Obtén los datos necesarios para generar el PDF
        $equipments = Equipment::select(
            'equipments.id',
            'equipments.serial_number',
            'equipments.status',
            'equipments.QR',
            'keyboards.serial_number as keyboard_serial_number',
            'mouses.serial_number as mouse_serial_number',
            'monitors.serial_number as monitor_serial_number',
            'ordenadores.serial_number as ordenador_serial_number'
        )
            ->join('keyboards', 'keyboards.id', '=', 'equipments.keyboards_id')
            ->join('mouses', 'mouses.id', '=', 'equipments.mouses_id')
            ->join('monitors', 'monitors.id', '=', 'equipments.monitors_id')
            ->join('ordenadores', 'ordenadores.id', '=', 'equipments.ordenadores_id')
            ->get();

        // Renderiza la vista con los datos
        $html = view('pdf.equipments', compact('equipments'))->render();

        // Crea una instancia de Dompdf
        $dompdf = new Dompdf();

        // Carga el HTML en Dompdf
        $dompdf->loadHtml($html);

        // Configura las opciones de Dompdf
        $options = $dompdf->getOptions();
        $options->set('defaultPaperSize', 'A4');
        $options->set('defaultPaperOrientation', 'landscape');
        $dompdf->setOptions($options);

        // Renderiza el PDF
        $dompdf->render();

        // Genera el PDF y lo devuelve como una respuesta para descargar
        return $dompdf->stream('equipments.pdf');
    }
}
