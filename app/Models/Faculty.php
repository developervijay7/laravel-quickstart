<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;

    public function courses()
    {
        return $this->morphMany(Course::class, 'courseable');
    }

    public function departments()
    {
        return $this->hasMany(Department::class);
    }
}
