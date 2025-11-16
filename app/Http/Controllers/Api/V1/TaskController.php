<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Http\Resources\Api\TaskResource;
use App\Services\TaskService;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(TaskService $taskService, Request $request)
    {
        $post = $taskService->getWithLimit($request->get('limit'), $request->get('offset'));
        return TaskResource::collection($post);
    }

    public function store(TaskRequest $request, TaskService $taskService)
    {
        $task = $taskService->createTask($request->toDto());
        dd($request->toDto());
        dd(TaskResource::make($task));
    }

    public function destroy(Request $request, TaskService $taskService)
    {
        $taskService->destroyTaskById($request->id);
        return response()->noContent();
    }

    public function show(Request $request, TaskService $taskService)
    {
        $task = $taskService->getTaskById($request->id);
        return TaskResource::make($task);
    }

    public function update(TaskRequest $request, TaskService $taskService)
    {
        $task = $taskService->updateTask($request->validated(), $request->id);
        return TaskResource::make($task);
    }
}
