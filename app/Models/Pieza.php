<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pieza extends Model
{
    use HasFactory;

    protected $fillable = [
        'idpieza',
        'nombrepieza',
        'pesoteorico',
        'pesoreal',
        'estado',
        'bloque_id',
        'registrado',
        'proyecto_id'
];
}
