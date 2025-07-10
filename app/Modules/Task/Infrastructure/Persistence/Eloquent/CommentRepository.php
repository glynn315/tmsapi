<?php

namespace App\Modules\Task\Infrastructure\Persistence\Eloquent;

use App\Modules\Task\Domain\Entities\Comments;

class CommentRepository
{
    public function displayAll():array{
        return CommentsModel::all()->map(fn($comment) => new Comments(
            $comment->comment_description, $comment->comment_attachment, $comment->task_id, $comment->comment_status
        ))->toArray();
    }

    public function displayCommentsByTask(string $task_id): array
    {
        return CommentsModel::where('task_id', $task_id)
            ->get()
            ->map(function ($comment) {
                return new Comments(
                    $comment->comment_description,
                    $comment->comment_attachment,
                    $comment->task_id,
                    $comment->comment_status
                );
            })
            ->toArray(); // Return as array of domain Comments
    }

    public function createComment(Comments $comments): Comments{
        $comment_information = CommentsModel::create([
            'comment_description' => $comments->comment_description,
            'comment_attachment' => $comments->comment_attachment,
            'task_id' => $comments->task_id,
            'comment_status' => $comments->comment_status,
        ]);

        return new Comments($comments->comment_description,$comments->comment_attachment,$comments->task_id,$comments->comment_status);
    }

    public function updateComment(string $comment_id, Comments $comments): ?Comments{
        $commentUpdate = CommentsModel::find($comment_id);
        if (!$commentUpdate) {
            return null;
        }

        $commentUpdate->update([
            'comment_description' => $comments->comment_description,
            'comment_attachment' => $comments->comment_attachment,
            'task_id' => $comments->task_id,
            'comment_status' => $comments->comment_status,
        ]);

        return new Comments(
            $comments->comment_description,
            $comments->comment_attachment,
            $comments->task_id,
            $comments->comment_status
        );
    }


}