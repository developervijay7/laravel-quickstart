<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;


    public function courses()
    {
        return $this->morphMany(Course::class, 'courseable');
    }

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }
}
