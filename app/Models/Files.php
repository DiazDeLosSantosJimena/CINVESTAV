<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'name',
        'type'
    ];

    public function Project() {
        return $this->belongsTo(Project::class,'project_id');
    }

}
