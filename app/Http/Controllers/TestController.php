<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TestController extends Controller
{
    public function showAll()
    {
        $tasks = Task::getAll();
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


}