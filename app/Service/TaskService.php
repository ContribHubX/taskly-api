<?php

namespace App\Services;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class TaskService
{
    public function createTask(StoreTaskRequest $request) : Task
    {
        $data = $request->validated();
        return Task::create($data);
    }

    public function updateTask(UpdateTaskRequest $request, Task $existingTask) : Task
    {
        $data = $request->validated();
        $existingTask->update($data);
        return $existingTask;
    }

    public function deleteTask(Task $task) : Task
    {
        $task->delete();
        return $task;
    }

    public function getTask(Task $task) : Task
    {
        return $task;
    }

    public function getTasks() : Collection
    {
        return Task::where(Task::USER_ID, Auth::id())->get();
    }
}

