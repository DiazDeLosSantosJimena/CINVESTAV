<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
    
class ProjectsUsers extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'user_id'
    ];

    public function Projects() {
        return $this->belongsTo(Projects::class,'project_id');
    }

    public function User() {
        return $this->belongsTo(User::class,'user_id');
    }

    public function Evaluations()
    {
        return $this->hasMany(Evaluations::class, 'project_user','id');
    }

    public function Presentations() {
        return $this->hasMany(Presentations::class,'pro_users','id');

    }
}

