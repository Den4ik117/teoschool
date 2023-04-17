<?php

namespace App\Models;

use App\Traits\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class WorkingClass extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'name',
    ];

    public function persons(): BelongsToMany
    {
        return $this->belongsToMany(Person::class, 'class_person', 'class_id', 'person_id');
    }
}
