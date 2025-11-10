<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;

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
        return view('task.edit', ['task' => $task]);
    }

    public function showCreate()
    {
        $task = new Task();
        return view('task.create', ['task' => $task]);
    }

    public function insert(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'due' => 'required|date',
        ]);

        Task::create([
            'title' => $validated['title'],
            'due' => $validated['due'],      
        ]);

        return redirect('/tasks');
    }

    public function update(Request $request)
    {

        $validated = $request->validate([
            'id' => 'required|exists:tasks,id',
            'title' => 'required|string|max:255',
            'due' => 'required|date',
        ]);

        $task = Task::find($validated['id']);
        if (!Gate::allows('update-task', $task))
        {
            return Redirect::back()->withErrors(['error' => 'не хватает прав']);
        }
        $task->update
        ([
            'title' => $validated['title'],
            'due' => $validated['due']
        ]);

        return redirect('/task/' . $task->id);
    }

    public function delete($id)
    {
        $task = Task::find($id);
        
        if ($task) 
            $task->delete();        

        return redirect('/tasks');
    }
}