<x-main-layout>
    <x-slot:title>Задача {{ $task->id }}</x-slot>
    
    <div class="task-detail">
        <h1>{{ $task->title }}</h1>
        <div>ID: {{ $task->id }}</div>
        <div>Срок выполнения: {{ $task->due }}</div>
        
        <div style="margin-top: 1rem;">
            <a href="/task/edit/{{ $task->id }}" style="margin-right: 1rem;">Редактировать</a>
            <a href="/tasks">К списку задач</a>
        </div>
    </div>
</x-main-layout>