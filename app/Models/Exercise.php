<?php

namespace App\Models;

use App\Enums\ExerciseStatus;
use App\Traits\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'name',
        'content',
        'person_id',
        'status',
        'reward',
    ];

    protected $casts = [
        'status' => ExerciseStatus::class,
    ];
}
