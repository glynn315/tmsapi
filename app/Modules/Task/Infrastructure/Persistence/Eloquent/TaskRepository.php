<?php

namespace App\Modules\Task\Infrastructure\Persistence\Eloquent;

use App\Modules\Task\Domain\Entities\Task;
use Request;

class TaskRepository
{
    public function all(): array{
        return TaskModel::all()->map(fn($u) => new Task(
            $u->task_id, $u->task_label, $u->task_description, $u->task_status
        ))->toArray();
    }

    public function findTask(string $id): ?Task{
        $task = TaskModel::find($id);
        if (!$task) {
            return null;
        }

        return new Task($task->task_id,$task->task_label,$task->task_description,$task->task_status);
    }

    public function Createtask(Task $task): Task{
        $task = TaskModel::create([
            'task_label' => $task->task_label,
            'task_description' => $task->task_description,
            'task_status' => $task->task_status
        ]);

        return new Task($task->task_id,$task->task_label,$task->task_description,$task->task_status);
    }

    public function updateTask(string $task_id, Task $task): ?Task{
        $taskUpdate = TaskModel::find($task_id);
        if (!$taskUpdate) {
            return null;
        }

        $taskUpdate->update([
            'task_label' => $task->task_label,
            'task_description' => $task->task_description,
            'task_status' => $task->task_status
        ]);

        return new Task($task->task_id,$task->task_label,$task->task_description,$task->task_status);
    }
}