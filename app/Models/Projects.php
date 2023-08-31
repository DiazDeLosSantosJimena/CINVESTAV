<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    use HasFactory;

    protected $fillable = [
        'tracking_key',
        'modality',
        'title',
        'thematic_area',
        'status'
    ];

    public function ProjectsUsers() {
        return $this->hasOne(ProjectsUsers::class,'project_id','id');

    }

    public function Files() {
        return $this->hasMany(Files::class,'project_id','id');

    }

    public function Authors() {
        return $this->hasMany(Authors::class,'project_id','id');
    }

    
    

}
