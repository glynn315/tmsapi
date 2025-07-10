<?php

namespace App\Modules\Task\Domain\Entities;

class Comments
{
    public function __construct(
        public string $comment_description,
        public ?string $comment_attachment,
        public string $task_id,
        public string $comment_status,
    ){}
}