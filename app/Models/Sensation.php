<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sensation extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'image_url'
    ];

    protected $hidden = [
        'updated_at'
    ];
}
