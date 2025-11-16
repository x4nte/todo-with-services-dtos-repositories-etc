<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\Services\TaskService;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(TaskService $taskService)
    {
        return view('tasks.index', ['tasks' => $taskService->getTasks()]);
    }

    public function store(TaskRequest $request, TaskService $taskService)
    {
        $taskService->createTask($request->validated());
        return redirect('/tasks');
    }

    public function destroy(Request $request, TaskService $taskService)
    {
        $taskService->destroyTaskById($request->id);
        return redirect('/tasks');
    }

    public function show(Request $request, TaskService $taskService)
    {
        $task = $taskService->getTaskById($request->id);
        return view('tasks.show', ['task' => $task]);
    }

    public function update(TaskRequest $request, TaskService $taskService)
    {
        $taskService->updateTask($request->validated(), $request->id);
        return redirect('/tasks');
    }
}
