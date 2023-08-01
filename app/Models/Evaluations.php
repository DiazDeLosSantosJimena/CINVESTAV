<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluations extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'project_user',
        'title',
        'extension',
        'key_words',
        'abstract_keywords',
        'problematic',
        'theoretical',
        'methodology',
        'proposal',
        'results',
        'APA_table',
        'APA_references',
        'format',
        'status',
        'comment'
    ];

    public function ProjectsUsers() {
        return $this->belongsTo(ProjectsUsers::class,'project_user');
    }

    public function User() {
        return $this->belongsTo(User::class,'user_id');
    }
}
