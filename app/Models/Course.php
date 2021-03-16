<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lesson;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'course_url',
        'url'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}
