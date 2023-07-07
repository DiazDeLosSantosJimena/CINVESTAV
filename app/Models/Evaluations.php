<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluations extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'project_id',
        'title',
        'extension',
        'key_words',
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

    public function Projects() {
        return $this->belongsTo(Projects::class,'project_id', 'id');
    }

    public function User() {
        return $this->hasOne(User::class,'user_id', 'id');
    }
}
