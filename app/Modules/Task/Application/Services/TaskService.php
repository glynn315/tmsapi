<?php

namespace App\Modules\Task\Application\Services;

use App\Modules\Task\Domain\Entities\Task;
use App\Modules\Task\Infrastructure\Persistence\Eloquent\TaskRepository;
use Str;

class TaskService
{
    public function __construct(private TaskRepository $repo)
    {
        
    }

    public function all(): array
    {
        return $this-> repo -> all();
    }

    public function findTask(string $id): ?Task{
        return $this->repo->findTask($id);
    }

    public function createTask(string $task_label, string $task_description, string $task_status): Task{
        return $this->repo->Createtask(new Task(
            (string) Str::uuid(),$task_label,$task_description,$task_status
        ));
    }

    public function updateTask(string $task_id, string $task_label, string $task_description, string $task_status): ?Task{
        return $this->repo->Createtask(new Task(
            $task_id,$task_label,$task_description,$task_status
        ));
    }
}