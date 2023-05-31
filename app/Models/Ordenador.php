<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ordenador extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'ordenadores'; // Nombre de la tabla

    protected $fillable = [
        'serial_number',
        'model',
        'brand',
        'ram',
        'processor',
        'hard_disk',
        'network_connection',
        'location'
    ];

    public function equipment()
    {
        return $this->hasOne(Equipment::class, 'ordenadores_id');
    }
}
