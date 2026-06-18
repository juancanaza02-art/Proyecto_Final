<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['cuerpo', 'user_id', 'task_id'];

    // Relación N:1 con User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación N:1 con Task
    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
