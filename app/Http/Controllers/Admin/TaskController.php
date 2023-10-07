<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\Models\User;
use App\Repositories\Interfaces\TaskRepositoryInterface;
use Illuminate\Support\Facades\Cache;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.tasks.index', [
            'tasks' => Task::with(['assignedTo', 'assignedBy'])->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $admins = Cache::remember('admins', now()->addDay(), function () {
            return User::select(['id', 'name', 'email'])->admin()->get();
        });

        $users = Cache::remember('users', now()->addDay(), function () {
            return User::select(['id', 'name', 'email'])->user()->get();
        });

        return view('admin.tasks.create', [
            'admins' => app('admins'),
            'users' => app('users'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request, TaskRepositoryInterface $taskRepository)
    {
        $taskRepository->create(...$request->validated());

        return redirect()->route('admin.tasks.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('admin.tasks.edit', [
            'task' => $task,
            'admins' => app('admins'),
            'users' => app('users'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, Task $task, TaskRepositoryInterface $taskRepository)
    {
        $taskRepository->update($task, ...$request->validated());

        return redirect()->route('admin.tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task, TaskRepositoryInterface $taskRepository)
    {
        $taskRepository->delete($task);

        return back();
    }
}
