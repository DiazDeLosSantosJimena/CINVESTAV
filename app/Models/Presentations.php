<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presentations extends Model
{
    use HasFactory;
    protected $fillable = [
        'pro_users',
        'date',
        'hour',
        'site',
        'assistance',
        'participants',
        'part',
        'status'
    ];

    public function ProjectsUsers() {
        return $this->belongsTo(ProjectsUsers::class,'pro_users');
    }

    public function Preattendances() {
        return $this->hasMany(Preattendances::class, 'presentation_id', 'id');
    }
}
