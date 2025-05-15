<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuarios';

    // Campos permitidos para asignación masiva
    protected $fillable = [
        'nombre',
        'apellido',
        'rut',
        'fecha_nacimiento',
    ];

    public function rol()
    {
        return $this->hasOne(Rol::class, 'rut', 'rut');
    }
}
