<?php

namespace App\Modules\Task\Interfaces\Http\Controller;

use App\Http\Controllers\Controller;
use App\Modules\Task\Application\Services\CommentService;
use Illuminate\Http\Request;

final class CommentController extends Controller
{
    public function __construct(private CommentService $service){}

    public function index(){
        return response()->json($this->service->displayAll());
    }

    public function createComment(Request $request){
        $comment = $request->validate([
            'comment_description' => 'required|string',
            'comment_status' => 'required|string',
            'task_id' => 'required|string',
            'comment_attachment' => 'string',
        ]);
        $comment_info = $this->service->createComment(...array_values($comment));
        return response()->json($comment_info, 201);
    }

    public function showComments(string $task_id){
        $comments = $this->service->displayCommentsByTask($task_id);
        return $comments ? response()->json($comments): response()->json(['error' => 'Comment Not Found'], 404);
    }

    public function updateComments(Request $request, string $comment_id){
        $comments = $request->validate([
            'task_label' => 'required|string',
            'task_description' => 'required|string',
            'task_status' => 'required|string',
        ]);

        $comments = $this->service->updateComment($comment_id, ...array_values($comments));
        return $comments ? response()->json($comments) : response()->json(['error' => 'Comment not found'], 404);
    }


}
