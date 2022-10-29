<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    use HasFactory;

    protected $fillable = [
        'module_id',
        'name',
        'content',
        'tasks'
    ];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}
