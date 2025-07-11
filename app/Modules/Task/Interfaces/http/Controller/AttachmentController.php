<?php

namespace App\Modules\Task\Interfaces\Http\Controller;

use App\Http\Controllers\Controller;
use App\Modules\Task\Application\Services\AttachmentServices;
use App\Modules\Task\Application\Services\CommentService;
use Illuminate\Http\Request;

final class AttachmentController extends Controller
{
    public function __construct(private AttachmentServices $service){}

    public function index(){
        return response()->json($this->service->displayAttachments());
    }

    public function createAttachments(Request $request){
        $attachment = $request->validate([
            'details_attachment' => 'required|string',
            'details_status' => 'required|string',
            'task_id' => 'required|string',
        ]);
        $attachment_info = $this->service->createAttachment(...array_values($attachment));
        return response()->json($attachment_info, 201);
    }

    public function showAttachments(string $task_id){
        $attachments = $this->service->displayAttachmentByTask($task_id);
        return $attachments ? response()->json($attachments): response()->json(['error' => 'Attachment Not Found'], 404);
    }

    public function updateAttachments(Request $request, string $comment_id){
        $attachment = $request->validate([
            'details_attachment' => 'required|string',
            'details_status' => 'required|string',
            'task_id' => 'required|string',
        ]);

        $attachment_info = $this->service->updateAttachment($comment_id, ...array_values($attachment));
        return $attachment_info ? response()->json($attachment_info) : response()->json(['error' => 'Attachment not found'], 404);
    }


}
