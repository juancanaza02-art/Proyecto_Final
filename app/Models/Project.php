<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['nombre', 'descripcion', 'estado', 'owner_id'];

    // Relación N:1 con User (Dueño)
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    // Relación N:M con User (Miembros del proyecto)
    public function members()
    {
        return $this->belongsToMany(User::class)->withPivot('project_role')->withTimestamps();
    }

    // Relación 1:N con Task
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
