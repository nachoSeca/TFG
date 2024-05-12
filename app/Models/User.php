<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    // Relación N:1 de User a Role
    // Un Usuario pertenece a un Rol
    // public function role(){
    //     return $this->belongsTo(Role::class);
    // }

    // Relación 1:1 de User a Student
    // Un estudiante solo tiene un usuario
    public function student()
    {
        return $this->hasOne(Student::class);
    }

    // Relación 1:1 de User a Tutor
    // Un tutor solo tiene un usuario
    public function tutor()
    {
        return $this->hasOne(Tutor::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'external_id',
        'external_auth',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function getAvatarUrl()
    {
        if (filter_var($this->avatar, FILTER_VALIDATE_URL)) {
            // Si el avatar es una URL, devolvemos la URL directamente
            return $this->avatar;
        } else {
            // Si no es una URL, asumimos que es un usuario normal y la imagen está en el storage
            return asset('storage/avatar/' . $this->avatar);
        }
    }

    public function adminlte_image()
    {
        return $this->getAvatarUrl();
    }

    public function adminlte_desc()
    {
        // return 'Administrador';
        return $this->roles->first()?->name ?? 'No role assigned';    }

    public function adminlte_profile_url()
    {
        return 'profile';
    }

}
