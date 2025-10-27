<x-main-layout>
    <x-slot:title>Создание задачи</x-slot>
    
    <h1>Создание новой задачи</h1>
    
    <div style="margin-bottom: 1rem;">
        <a href="/tasks">← Назад к списку задач</a>
    </div>
    
    <x-task-form 
        :task="$task" 
        action="/task/create" 
        submitText="Создать задачу" 
    />
</x-main-layout>