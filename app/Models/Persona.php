<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;
    
      protected $table = 'persona';
      protected $primaryKey = 'id_persona';
      // Si la tabla no sigue la convención plural de Laravel
      

      // Si la tabla no tiene timestamps (opcional)
      public $timestamps = false;
  
      // Si deseas permitir la asignación masiva en ciertas columnas
      protected $fillable = ['nombre', 'apellido','fecha_nacimiento','genero','email','telefono','direccion','estado_civil','nacionalidad','numero_identificacion','ocupacion'];
}
