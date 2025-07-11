<?php

namespace App\Modules\Task\Infrastructure\Persistence\Eloquent;

use App\Modules\Task\Domain\Entities\Attachments;

class AttachmentRepository
{
    public function displayAttachments(): array{
        return AttachmentModel::all()->map(fn($attachment)=> new Attachments(
            $attachment->details_attachments,$attachment->details_status,$attachment->task_id
        ))->toArray();
    }


    public function displayAttachmentByTask(string $task_id): array
    {
        return AttachmentModel::where('task_id' , '=', $task_id)
        ->get()
        ->map(function($attachment){
            return new Attachments(
                $attachment->details_attachment,
                $attachment->details_status,
                $attachment->task_id,
            );
        })->toArray();
    }

    public function createAttachments(Attachments $attachments): Attachments {
        $attachment_information = AttachmentModel::create([
            'details_attachment' => $attachments->details_attachment,
            'details_status'=> $attachments->details_attachment,
            'task_id'=> $attachments->task_id,
        ]);

        return new Attachments($attachments->details_attachment,$attachments->details_status,$attachments->task_id);
    }

    public function updateAttachments(int $attachment_id , Attachments $attachment): ?Attachments{
        $attachmentUpdate = AttachmentModel::find($attachment_id);
        if (!$attachment_id) {
            return null;
        }

        $attachmentUpdate->update([
            'details_attachment' => $attachment->details_attachment,
            'details_status'=> $attachment->details_attachment,
            'task_id'=> $attachment->task_id,
        ]);

        return new Attachments(
            $attachment->details_attachment,
            $attachment->details_status,
            $attachment->task_id,
        );

    }


}