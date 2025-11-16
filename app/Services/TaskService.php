<?php

namespace App\Services;

use App\DTO\TaskDTO;
use App\Models\Task;
use App\Repositories\TaskRepository;
use Illuminate\Database\Eloquent\Collection;

class TaskService
{
    protected int $limit = 10;
    protected int $offset = 0;

    public function __construct(private TaskRepository $taskRepository)
    {
    }

    public function getWithLimit(?int $limit, ?int $offset)
    {
        $this->limit = $limit ?? 10;
        $this->offset = $offset ?? 0;
        return $this->taskRepository->getWithLimit($this->limit, $this->offset);
    }

    public function getTasks(): Collection
    {
        return $this->taskRepository->all();
    }

    public function createTask(TaskDTO $taskDto): Task
    {
        return $this->taskRepository->create(
            [
                'title' => $taskDto->title,
                'description' => $taskDto->description
            ]);
    }

    public function destroyTaskById(int $id): bool
    {
        $task = $this->taskRepository->getById($id);
        return $this->taskRepository->delete($task);
    }

    public function getTaskById(int $id): Task
    {
        return $this->taskRepository->getById($id);
    }

    public function updateTask(array $data, int $id): bool
    {
        $task = $this->taskRepository->getById($id);
        return $this->taskRepository->update($task, $data);
    }
}
