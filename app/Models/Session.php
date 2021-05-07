<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'session_date',
    ];

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}
