<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    use HasFactory;

    // Relación 1:1 de Tutor a User
    // Un tutor solo tiene un usuario
    public function user(){
        return $this->belongsTo(User::class);
    }

    // Relación 1:N de Tutor a Student
    // Un tutor puede tener varios estudiantes
    public function students(){
        return $this->hasMany(Student::class);
    }

    // Relación 1:N de Tutor a Tracking
    // Un tutor puede tener varios seguimientos
    public function trackings(){
        return $this->hasMany(Tracking::class);
    }
}
