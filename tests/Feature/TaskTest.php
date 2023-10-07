<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    public function test_not_logged_in_users_cannot_access_dashboard(): void
    {
        $response = $this->get('/admin');

        $response->assertStatus(302);
        $response->assertRedirect('login');
    }

    public function test_regular_user_cannot_access_dashboard(): void
    {
        $response = $this->actingAs($this->createUser())->get('/admin');

        $response->assertStatus(302);
        $response->assertRedirect('/');
    }

    public function test_admin_can_access_dashboard(): void
    {
        $response = $this->actingAs($this->createUser(1))->get('/admin');

        $response->assertStatus(200);
    }

    public function test_admin_can_add_task(): void
    {
        $admin = $this->createUser(1);
        $user = $this->createUser();
        $task = [
            'title' => 'title 1',
            'description' => 'desc 1',
            'assigned_by_id' => $admin->id,
            'assigned_to_id' => $user->id,
        ];

        $response = $this->actingAs($admin)->post('admin/tasks', $task);

        $response->assertStatus(302);
        $response->assertRedirect('admin/tasks');
        $this->assertDatabaseHas('tasks', $task);
        $latestTask = Task::latest()->first();
        $this->assertEquals($task['title'], $latestTask->title);
        $this->assertEquals($task['description'], $latestTask->description);
        $this->assertEquals($task['assigned_by_id'], $latestTask->assigned_by_id);
        $this->assertEquals($task['assigned_to_id'], $latestTask->assigned_to_id);
    }

    public function test_admin_can_edit_task(): void
    {
        $admin = $this->createUser(1);
        $user = $this->createUser();
        $task = Task::create([
            'title' => 'title 1',
            'description' => 'desc 1',
            'assigned_by_id' => $admin->id,
            'assigned_to_id' => $user->id,
        ]);

        $editedTask = [
            'title' => 'title 2',
            'description' => 'desc 2',
            'assigned_by_id' => $admin->id,
            'assigned_to_id' => $user->id,
        ];

        $response = $this->actingAs($admin)->put('admin/tasks/'.$task->id, $editedTask);

        $response->assertStatus(302);
        $response->assertRedirect('admin/tasks');
        $this->assertDatabaseHas('tasks', $editedTask);
    }

    public function test_admin_can_delete_task(): void
    {
        $admin = $this->createUser(1);
        $user = $this->createUser();
        $taskData = [
            'title' => 'title 1',
            'description' => 'desc 1',
            'assigned_by_id' => $admin->id,
            'assigned_to_id' => $user->id,
        ];
        $task = Task::create($taskData);

        $response = $this->actingAs($admin)->delete('admin/tasks/'.$task->id);

        $response->assertStatus(302);
        $response->assertRedirect('admin/tasks');
        $this->assertDatabaseMissing('tasks', $taskData);
    }

    public function test_all_tasks_page_can_be_rendered(): void
    {
        $response = $this->actingAs($this->createUser(1))->get('/admin/tasks');
        $response->assertStatus(200);
    }

    public function test_create_task_page_can_be_rendered(): void
    {
        $response = $this->actingAs($this->createUser(1))->get('/admin/tasks');
        $response->assertStatus(200);
    }

    public function test_edit_task_page_can_be_rendered(): void
    {
        $task = Task::create([
            'title' => 'title 1',
            'description' => 'desc 1',
            'assigned_by_id' => $this->createUser(1)->id,
            'assigned_to_id' => $this->createUser()->id,
        ]);
        $response = $this->actingAs($this->createUser(1))->get('/admin/tasks/'.$task->id.'/edit');
        $response->assertStatus(200);
        $response->assertViewHas('task', $task);
    }

    private function createUser($isAdmin = 0)
    {
        return User::factory()->create(['is_admin' => $isAdmin]);
    }
}
