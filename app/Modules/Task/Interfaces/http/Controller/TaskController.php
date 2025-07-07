<?php

namespace App\Modules\Task\Interfaces\Http\Controller;

use App\Http\Controllers\Controller;
use App\Modules\Task\Application\Services\TaskService;
use Illuminate\Http\Request;

final class TaskController extends Controller
{
    public function __construct(private TaskService $service){}

    public function index(){
        return response()->json($this->service->all());
    }

    public function createTask(Request $request){
        $task = $request->validate([
            'task_label' => 'required|string',
            'task_description' => 'required|string',
            'task_status' => 'required|string',
        ]);
        $taskinfo = $this->service->createTask(...array_values($task));
        return response()->json($taskinfo, 201);
    }

    public function show(string $id){
        $task = $this->service->findTask($id);
        return $task ? response()->json($task): response()->json(['error' => 'TaskNot Found'], 404);
    }

    public function updateTask(Request $request, string $task_id){
        $task = $request->validate([
            'task_label' => 'required|string',
            'task_description' => 'required|string',
            'task_status' => 'required|string',
        ]);

        $Taskinfo = $this->service->updateTask($task_id, ...array_values($task));
        return $Taskinfo ? response()->json($Taskinfo) : response()->json(['error' => 'User not found'], 404);
    }


}
