<?php

namespace App\Repositories\Interfaces;

use App\Models\Task;
use Illuminate\Database\Eloquent\ModelNotFoundException;

interface TaskRepositoryInterface
{

    /**
     * Create a new task.
     *
     * @param string $title
     * @param string $description
     * @param int $assigned_by_id
     * @param int $assigned_to_id
     * @return Task
     */
    public function create(string $title, string $description, int $assigned_by_id, int $assigned_to_id): Task;

    /**
     * Update the task
     *
     * @param Task|int $task
     * @param string $title
     * @param string $description
     * @param int $assigned_by_id
     * @param int $assigned_to_id
     * @return void
     * @throws ModelNotFoundException
     */
    public function update(Task|int $task, string $title, string $description, int $assigned_by_id, int $assigned_to_id): void;

    /**
     * Delete the task.
     *
     * @param Task|int $task
     * @return void
     * @throws ModelNotFoundException
     */
    public function delete(Task|int $task): void;
}
