<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    // Relación 1:N de Role a User
    // Un Rol puede tener varios Usuarios
    public function users(){
        return $this->hasMany(User::class);
    }
}
