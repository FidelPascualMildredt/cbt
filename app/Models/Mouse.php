<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mouse extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table = 'mouses'; // Nombre de la tabla
    
    protected $fillable = [
        'serial_number',
        'model',
        'brand',
        'connection_type',
        'status',
        'location'
    ];

    public function equipment()
    {
        return $this->hasOne(Equipment::class, 'mouse_id');
    }
}
