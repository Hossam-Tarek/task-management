<?php

namespace App\Repositories;

use App\Models\Task;
use App\Repositories\Interfaces\TaskRepositoryInterface;

class TaskRepository implements TaskRepositoryInterface
{

    public function create(int $assigned_by_id, string $title, string $description, int $assigned_to_id): Task
    {
        return Task::create([
            'assigned_by_id' => $assigned_by_id,
            'title' => $title,
            'description' => $description,
            'assigned_to_id' => $assigned_to_id,
        ]);
    }

    public function update(Task|int $task, string $title, string $description, int $assigned_to_id): void
    {
        $this->getTask($task)->update([
            'title' => $title,
            'description' => $description,
            'assigned_to_id' => $assigned_to_id,
        ]);
    }

    public function delete(Task|int $task): void
    {
        $this->getTask($task)->delete();
    }

    /**
     * Get the task model instance.
     *
     * @param $task
     * @return Task
     */
    private function getTask($task): Task
    {
        if ($task instanceof Task) {
            return $task;
        }

        return Task::findOrFail($task);
    }
}
