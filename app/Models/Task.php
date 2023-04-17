<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'part_id',
        'type',
        'scores',
        'name',
        'options',
        'correct',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class)->using(TaskUser::class);
//        return $this->belongsToMany(User::class, 'task_user', 'task_id', 'user_id')->using(TaskUser::class);
    }
}
