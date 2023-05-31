<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Monitor extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'monitors'; // Nombre de la tabla

    protected $fillable = [
        // Atributos del monitor 
        'serial_number',
        'model',
        'brand',
        'connection_type',
        'screen_type',
        'status',
        'location'
    ];

    public function equipment()
    {
        return $this->hasOne(Equipment::class, 'monitors_id');
    }
}
