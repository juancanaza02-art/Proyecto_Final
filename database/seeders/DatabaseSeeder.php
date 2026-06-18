<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Creamos 5 usuarios de prueba
        $users = User::factory(5)->create();

        // 2. Creamos 3 proyectos y le asignamos el primer usuario como "owner"
        $projects = Project::factory(3)->create([
            'owner_id' => $users[0]->id,
        ]);

        // 3. Asignamos a los demás usuarios como miembros colaboradores del primer proyecto
        // Esto probará nuestra tabla pivote "project_user"
        $projects[0]->members()->attach(
            $users->where('id', '!=', $users[0]->id)->pluck('id')->toArray(),
            ['project_role' => 'colaborador']
        );

        // 4. Creamos 5 tareas para cada proyecto y las asignamos a usuarios aleatorios
        foreach ($projects as $project) {
            Task::factory(5)->create([
                'project_id' => $project->id,
                'assignee_id' => $users->random()->id,
            ]);
        }
    }
}
