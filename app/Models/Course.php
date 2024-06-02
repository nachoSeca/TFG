<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    // Relación 1:N de Course a Student
    // Un curso puede tener varios estudiantes
    public function students(){
        return $this->hasMany(Student::class);
    }

    // Relación 1:N de Course a Company
    // Un curso puede tener varias empresas
    public function companies(){
        return $this->hasMany(Company::class);
    }

    protected $fillable = ['nombre'];

    
}
