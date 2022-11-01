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

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    protected static function boot()
    {
        parent::boot();

        self::updated(function (Part $part) {
            $tasks = json_decode($part->tasks);

            foreach ($tasks as $task) {
//                dd($task);
                $part->tasks()->create([
                    'type' => $task->type,
                    'scores' => $task->scores,
                    'name' => $task->name,
                    'options' => json_encode($task->options),
                    'correct' => json_encode($task->correct),
                ]);
            }
        });
    }
}
