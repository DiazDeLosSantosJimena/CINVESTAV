<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workshops extends Model
{
    use HasFactory;
    protected $fillable = [
        'nameu',
        'title',
        'activity',
        'date',
        'hour',
        'site',
        'status',
        'level',
        'participants',
        'part',
        'assistance'
    ];

    public function Workshopattendance() {
        return $this->hasMany(Workshopattendance::class, 'workshop_id', 'id');
    }
}
