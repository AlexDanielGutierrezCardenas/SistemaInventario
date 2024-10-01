<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Despachador extends Model
{
    use HasFactory;
    protected $table = 'despachador';
    protected $primaryKey = 'id_despachador';
    // Si la tabla no sigue la convención plural de Laravel
    

    // Si la tabla no tiene timestamps (opcional)
    public $timestamps = false;

    // Si deseas permitir la asignación masiva en ciertas colum
    protected $fillable = ['id_persona', 'turno','zona_asignada','fecha_contratacion','estado_despachador','contacto'];
}
