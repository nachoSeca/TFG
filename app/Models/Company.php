<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    // Relación 1:N de Company a Student
    // Una empresa puede tener varios estudiantes
    public function students(){
        return $this->hasMany(Student::class);
    }

    // Relación 1:N de Company a Course
    // Una empresa puede tener un curso
    public function course(){
        return $this->belongsTo(Course::class);
    }

    protected $fillable = ['nombre', 'direccion', 'codigo_postal', 'municipio', 'localidad', 'provincia', 'web', 'nombre_contacto', 'apellido_contacto', 'email_contacto', 'telefono_fijo', 'telefono_movil', 'fecha_ultimo_contacto', 'plazas_disponibles', 'observaciones', 'course_id'];

    
}
