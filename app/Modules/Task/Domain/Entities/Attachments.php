<?php

namespace App\Modules\Task\Domain\Entities;

class Attachments
{
    public function __construct(
        public string $details_attachment,
        public string $details_status,
        public string $task_id,
    )
    {
    }
}