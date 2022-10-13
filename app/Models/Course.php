<?php

namespace App\Models;

use App\Enums\Part;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'parts',
        'description'
    ];

    protected $casts = [
        'parts' => Part::class
    ];

    public function modules()
    {
        return $this->hasMany(Module::class);
    }
}
