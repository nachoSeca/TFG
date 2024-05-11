<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tracking extends Model
{
    use HasFactory;

    // Relación 1:N de Tracking a Student
    // Un seguimiento pertenece a un estudiante
    public function student(){
        return $this->belongsTo(Student::class);
    }

    // Relación 1:N de Tracking a Tutor
    // Un seguimiento pertenece a un tutor
    public function tutor(){
        return $this->belongsTo(Tutor::class);
    }

    protected $fillable = ['fecha_seguimiento', 'observaciones', 'pdf_seguimiento', 'tutor_id', 'student_id'];

    
}
