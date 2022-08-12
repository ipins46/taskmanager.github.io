<?php

namespace App\Http\Controllers\Tasks;

use App\Models\Task;
use App\Http\Controllers\Controller;
use App\Http\Resources\TaskResource;
use Illuminate\Http\Request;


class TaskController extends Controller
{

    public function index()
    {
        // return Task::get();
        $tasks = Task::latest()->get();
        return TaskResource::collection($tasks);
    }

    public function show(Task $task)
    {
        return TaskResource::make($task);
    }

    public function store()
    {
        request()->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $task = Task::create([
            'title' => request('title'),
            'content' => request('content'),
        ]);

        return response()->json([
            'message' => 'Berhasil Terbuat',
            'task' => $task,
        ]);
    }

    public function update(Task $task)
    {
        request()->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $task->update([
            'title' => request('title'),
            'content' => request('content'),
        ]);

        return response()->json([
            'message' => 'Berhasil Terupdate',
            'task' => $task,
        ]);

        // return $task;
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return response()->json([
            'message' => 'Berhasil Terhapus',
        ], 200);
    }


}
