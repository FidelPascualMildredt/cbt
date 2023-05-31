<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipment;
use App\Models\Keyboard;
use App\Models\Monitor;
use App\Models\Mouse;
use App\Models\Ordenador;

class ContainerController extends Controller
{
    public function index()
    {       
$mouse = Mouse::count('id');
$equipment = Equipment::count('id');
$keyboard = Keyboard::count('id');
$monitor= Monitor::count('id');
$ordenador = Ordenador::count('id');



return view('layouts.container', compact('mouse','equipment','keyboard','monitor','ordenador'));
    }
}
