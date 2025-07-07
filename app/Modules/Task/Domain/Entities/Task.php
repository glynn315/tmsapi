<?php

namespace App\Modules\Task\Domain\Entities;

class Task
{
    public function __construct(
        public string $task_id,
        public string $task_label,
        public string $task_description,
        public string $task_status,
    )
    {}
}