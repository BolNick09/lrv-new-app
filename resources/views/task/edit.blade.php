<x-main-layout>
    <x-slot:title>Редактирование задачи</x-slot>
    
    <h1>Редактирование задачи</h1>
    
    <div style="margin-bottom: 1rem;">
        <a href="/task/{{ $task->id }}">← Назад к задаче</a> | 
        <a href="/tasks">К списку задач</a>
    </div>
    
    <x-task-form 
        :task="$task" 
        action="/task/update" 
        submitText="Сохранить" 
    />
</x-main-layout>