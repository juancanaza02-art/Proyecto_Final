<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['titulo', 'descripcion', 'estado', 'prioridad', 'due_date', 'project_id', 'assignee_id'];

    // Relación N:1 con Project
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    // Relación N:1 con User (Asignado)
    public function assignee()
    {
        return $this->belongsTo(User::class, 'assignee_id');
    }

    // Relación 1:N con Comment
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // Relación N:M con Label
    public function labels()
    {
        return $this->belongsToMany(Label::class);
    }
}
