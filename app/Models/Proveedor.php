<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Proveedor extends Model
{
    use HasFactory;
    protected $table = 'proveedores';
    protected $primaryKey = 'id_proveedor';
    // Si la tabla no sigue la convención plural de Laravel
    

    // Si la tabla no tiene timestamps (opcional)
    public $timestamps = false;

    // Si deseas permitir la asignación masiva en ciertas columnas
    protected $fillable = ['id_persona', 'nit','direccion'];
    
}
