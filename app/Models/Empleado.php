<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    protected $table = 'empleado';
    protected $primaryKey = 'id_empleado';
    // Si la tabla no sigue la convención plural de Laravel
    

    // Si la tabla no tiene timestamps (opcional)
    public $timestamps = false;

    // Si deseas permitir la asignación masiva en ciertas columnas
    protected $fillable = ['id_persona', 'puesto', 'salario','fecha_contratacion'];

}
