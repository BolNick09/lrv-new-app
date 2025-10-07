<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TestController extends Controller
{
    function showAll()
    {
        $tasks = Task::all();
        return view('task.all', ['tasks' => $tasks]);
    }

    function showOne($id)
    {
        $task = Task::find($id);
        
        if (!$task) {
            abort(404, 'Задача не найдена');
        }
        
        return view('task.one', ['task' => $task]);
    }
}