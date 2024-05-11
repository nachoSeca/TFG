<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeTracking extends Model
{
    use HasFactory;

    // Relación 1:N de TypeTracking a Tracking
    // Un tipo de seguimiento puede tener varios seguimientos
    public function trackings()
    {
        return $this->hasMany(Tracking::class);
    }
    

    protected $fillable = ['nombre', 'descripcion'];


}
