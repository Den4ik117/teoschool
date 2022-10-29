<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $task
 * @property string $description
 */
class Module extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'part',
        'task',
        'description'
    ];

    protected function title(): Attribute
    {
        return Attribute::make(
            get: fn() => "<strong>{$this->task}:</strong>&nbsp;{$this->description}"
        );
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function parts()
    {
        return $this->hasMany(Part::class);
    }
}
