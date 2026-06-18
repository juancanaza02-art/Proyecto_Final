<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition(): array
    {
        return [
            'titulo' => fake()->sentence(4),
            'descripcion' => fake()->paragraph(),
            'estado' => fake()->randomElement(['por_hacer', 'en_progreso', 'revision', 'completada']),
            'prioridad' => fake()->randomElement(['baja', 'media', 'alta']),
            'due_date' => fake()->dateTimeBetween('now', '+1 month'),
            'project_id' => Project::factory(),
            'assignee_id' => User::factory(),
        ];
    }
}
