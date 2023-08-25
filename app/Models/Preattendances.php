<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preattendances extends Model
{
    use HasFactory;
    protected $fillable = [
        'presentation_id',
        'user_id',
    ];

    public function Presentations()
    {
        return $this->belongsTo(Presentations::class, 'presentation_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
