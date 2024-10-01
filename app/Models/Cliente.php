<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $table = 'cliente';
    protected $primaryKey = 'id_cliente';
    // Si la tabla no sigue la convención plural de Laravel
    

    // Si la tabla no tiene timestamps (opcional)
    public $timestamps = false;

    // Si deseas permitir la asignación masiva en ciertas columnas
    protected $fillable = ['id_despachador', 'id_proveedor','id_solicitante','id_administrador','fecha_registro', 'tipo_cliente'];

}
