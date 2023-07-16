<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workshopattendance extends Model
{
    use HasFactory;
    protected $fillable = [
        'workshop_id',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function workshop()
    {
        return $this->belongsTo(Workshops::class, 'workshop_id');
    }
}
