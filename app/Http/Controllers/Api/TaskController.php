<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::latest()->get();
        return response()->json([
            'data' => $tasks
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => ['required', 'max:191'],
            'description' => ['required', 'min:20'],
            'completed'=> ['required', 'boolean']
        ]);
        $data = $request->only(['title', 'description', 'completed']);
        $task = Task::create($data);
        return response()->json([
            'data' => $task
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return response()->json([
            'data' => $task
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $this->validate($request, [
            'title' => ['required', 'max:191'],
            'description' => ['required', 'min:20'],
            'completed'=> ['required', 'boolean']
        ]);
        $data = $request->only(['title', 'description', 'completed']);
        $task->fill($data)->save();

        return response()->json([
            'data' => $task
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        return response()->json([
            'data' => $task->delete()
        ]);
    }
}
