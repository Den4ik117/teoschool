<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Course;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'title',
        'subtitle',
        'image_url',
        'prev_lesson',
        'next_lesson',
        'url',
        'content',
        'publish'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
