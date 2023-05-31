<?php

namespace App\Models;


use App\Models\Keyboard;
use App\Models\Monitor;
use App\Models\Mouse;
use App\Models\Ordenador;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Equipment extends Model
{
    public $timestamps = false;
    use HasFactory, SoftDeletes;

    protected $table = 'equipments'; // Nombre de la tabla

    protected $fillable = [
        'serial_number',
        'status',
        'user',
        'QR',
        'mouses_id',
        'ordenadores_id',
        'keyboards_id',
        'monitors_id',
    ];

    public function mouse()
    {
        return $this->belongsTo(Mouse::class, 'mouses_id');
    }

    public function ordenador()
    {
        return $this->belongsTo(Ordenador::class, 'ordenadores_id');
    }

    public function keyboard()
    {
        return $this->belongsTo(Keyboard::class, 'keyboards_id');
    }

    public function monitor()
    {
        return $this->belongsTo(Monitor::class, 'monitors_id');
    }

}
