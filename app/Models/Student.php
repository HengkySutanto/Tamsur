<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'phone',
        'place_of_birth',
        'date_of_birth',
        'geup',
        'reg_number',
        'status',
        'photo',
    ];

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}
