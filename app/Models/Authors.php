<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Authors extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'name',
        'apm',
        'app',
        'institution_of_origin',
        'state'
    ];

    public function Project() {
        return $this->belongsTo(Project::class,'project_id');
    }

}
