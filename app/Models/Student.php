<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // Relación 1:1 de Student a User
    // Un estudiante solo tiene un usuario
    public function user(){
        return $this->belongsTo(User::class);
    }

    // Relación 1:N de Student a Course
    // Un estudiante puede tener un curso
    public function course(){
        return $this->belongsTo(Course::class);
    }

    // Relación 1:N de Student a Tutor
    // Un estudiante puede tener un tutor
    public function tutor(){
        return $this->belongsTo(Tutor::class);
    }

    // Relación 1:N de Student a Company
    // Un estudiante puede tener una empresa
    public function company(){
        return $this->belongsTo(Company::class);
    }

    // Relación 1:N de Student a Tracking
    // Un estudiante puede tener varios seguimientos
    public function trackings(){
        return $this->hasMany(Tracking::class);
    }

    protected $fillable = ['nombre', 'apellidos', 'email', 'user_id' ,'telefono_movil', 'course_id', 'nota_media', 'company_id', 'subir_cv', 'fecha_inicio_fct', 'fecha_fin_fct', 'direccion_practicas', 'tutor_id'];

}
