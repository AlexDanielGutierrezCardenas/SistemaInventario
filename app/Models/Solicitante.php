<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitante extends Model
{
    use HasFactory;
    protected $table = 'solicitante';
    protected $primaryKey = 'id_solicitante';
    // Si la tabla no sigue la convención plural de Laravel
    

    // Si la tabla no tiene timestamps (opcional)
    public $timestamps = false;

    // Si deseas permitir la asignación masiva en ciertas colum
    protected $fillable = ['id_persona', 'estado_solicitud','fecha_solicitud','tiposolicitud'];
}
