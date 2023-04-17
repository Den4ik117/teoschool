<?php

namespace App\Models;

use App\Enums\PersonGrade;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Person extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'grade',
        'scores',
    ];

    protected $casts = [
        'grade' => PersonGrade::class,
    ];

    public function classes(): BelongsToMany
    {
        return $this->belongsToMany(WorkingClass::class, 'class_person', 'person_id', 'class_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function exercises(): HasMany
    {
        return $this->hasMany(Exercise::class);
    }
}
