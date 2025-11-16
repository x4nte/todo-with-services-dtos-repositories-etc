<?php

namespace App\Repositories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;

class TaskRepository
{

    public function getWithLimit(int $limit, int $offset)
    {
        return Task::query()
            ->offset($offset)
            ->limit($limit)
            ->get();
    }

    public function all(): Collection
    {
        return Task::all();
    }

    public function getById($id): ?Task
    {
        return Task::findOrFail($id);
    }

    public function create($data): Task
    {
        return Task::create($data);
    }

    public function update(Task $task, $data): bool
    {
        return $task->update($data);
    }

    public function delete(Task $task): bool
    {
        return $task->delete();
    }
}
