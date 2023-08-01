<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'apm',
        'app',
        'alternative_contact', //Campo que funciona como contacto alterno en los ponentes y titulo academico en los demás usuarios
        'email',
        'password',
        'phone',
        'photo',
        'country',
        'state',
        'municipality',
        'assistance',
        'rol_id'
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function Roles() {
        return $this->belongsTo(Roles::class,'rol_id');
    }

    public function ProjectsUsers() {
        return $this->hasOne(ProjectsUsers::class,'user_id','id');
    }

    public function Evaluations() {
        return $this->hasMany(Evaluations::class,'user_id', 'id');
    }
}
