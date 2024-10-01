<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distribuidora extends Model
{
    use HasFactory;
    protected $table = 'distribuidora';
    protected $primaryKey = 'id_distribuidora';
    // Si la tabla no sigue la convención plural de Laravel
    

    // Si la tabla no tiene timestamps (opcional)
    public $timestamps = false;

    // Si deseas permitir la asignación masiva en ciertas columnas
    protected $fillable = ['id_proveedor', 'nombre', 'direccion','telefono','email'];
}
