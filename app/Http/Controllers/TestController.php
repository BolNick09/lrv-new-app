<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TestController extends Controller
{
    public function showAll()
    {
        $tasks = Task::all();
        return view('task.all', ['tasks' => $tasks]);
    }

    public function showOne($id)
    {
        $task = Task::find($id);
        
        if (!$task) 
            abort(404, 'Задача не найдена');
        
        
        return view('task.one', ['task' => $task]);
    }

    public function showEdit($id)
    {
        $task = Task::find($id);
        return view ('task.edit', ['task' => $task]);
    }

    public function showCreate()
    {
        $task = new \stdClass();
        $task->id = '';
        $task->title = '';
        $task->due = '';
        
        return view('task.create', ['task' => $task]);
    }

    public function insert (Request $request)
    {
        $task = new Task;
        $task->title = $request->title;
        $task->due = $request->due;
        $task->save();

        return redirect ('/tasks');
    }


}