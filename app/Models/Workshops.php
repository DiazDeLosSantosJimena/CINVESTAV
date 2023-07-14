<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workshops extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'activity',
        'date',
        'hour',
        'site',
        'status'
    ];

    public function Workshopattendance() {
        return $this->hasMany(Workshopattendance::class, 'workshop_id', 'id');
    }
}
