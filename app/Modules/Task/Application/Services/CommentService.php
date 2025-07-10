<?php

namespace App\Modules\Task\Application\Services;

use App\Modules\Task\Domain\Entities\Comments;
use App\Modules\Task\Infrastructure\Persistence\Eloquent\CommentRepository;

class CommentService
{
    public function __construct(private CommentRepository $repo)
    {
        
    }

    public function displayAll():array{
        return $this->repo->displayAll();
    }

    public function displayCommentsByTask(string $task_id): array
    {
        return $this->repo->displayCommentsByTask($task_id);
    }

    public function createComment(string $comment_description,string $task_id ,string $comment_status, ?string $comment_attachment = null): Comments{
        return $this->repo->createComment(new Comments(
            $comment_description,$comment_attachment,$comment_status,$task_id
        ));
    }

    public function updateComment(string $comment_id,string $comment_description,string $task_id,string $comment_status, ?string $comment_attachment = null): ?Comments{
        $comment = new Comments($comment_description,$comment_attachment,$task_id,$comment_status);
        return $this->repo->updateComment($comment_id, $comment);
    }
}