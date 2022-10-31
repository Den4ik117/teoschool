<?php

namespace App\Models;

use App\Enums\Part;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'parts',
        'description',
        'fee'
    ];

    protected $casts = [
        'parts' => Part::class
    ];

    public function modules()
    {
        return $this->hasMany(Module::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'course_user');
    }

    protected static function boot()
    {
        parent::boot();

        self::creating(function($course) {
            $course->slug = Str::slug($course->name);
        });
    }
}
