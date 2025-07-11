<?php

namespace App\Modules\Task\Application\Services;

use App\Modules\Task\Domain\Entities\Attachments;
use App\Modules\Task\Infrastructure\Persistence\Eloquent\AttachmentRepository;

class AttachmentServices
{
    public function __construct(private AttachmentRepository $repo)
    {
        
    }

    public function displayAttachments(): array{
        return $this->repo->displayAttachments();
    }

    public function displayAttachmentByTask(string $task_id): array{
        return $this->repo->displayAttachmentByTask($task_id);
    }

    public function createAttachment(string $details_attachment, string $details_status, string $task_id){
        return $this->repo->createAttachments(new Attachments(
            $details_attachment,$details_status, $task_id
        ));
    }

    public function updateAttachment(string $attachment_id,string $details_attachment, string $details_status, string $task_id){
        $attachment = new Attachments($details_attachment,$details_status, $task_id);
        return $this->repo->updateAttachments($attachment_id, $attachment);
    }
}