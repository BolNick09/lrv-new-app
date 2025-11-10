<x-main-layout>
    <x-slot:title>Все задачи</x-slot>
    
    <h1>Все задачи</h1>
    
    <div style="border: 1px solid #ddd; padding: 1rem; margin-bottom: 2rem;">
        <h2>Добавить новую задачу</h2>
        <x-task-form 
            action="/task/create" 
            submitText="Добавить задачу" 
        />
    </div>
    
    @foreach ($tasks as $task)
        <div class="task" style="border: 1px solid #ccc; padding: 1rem; margin-bottom: 1rem;">
            <div>ID: {{ $task->id }}</div>
            <div>Срок: {{ $task->due }}</div>
            <div><strong>Заголовок:</strong> {{ $task->title }}</div>
            <div><strong>Владелец:</strong> {{ $task->user->name }}</div>
            <div style="margin-top: 0.5rem;">
                <a href="/task/{{ $task->id }}" style="margin-right: 1rem;">Просмотр</a>
                
                @can('update-task', $task)
                    <a href="/task/edit/{{ $task->id }}" style="margin-right: 1rem;">Редактировать</a>
                @endcan
                
                @can('delete-task', $task)
                    <form action="/task/delete/{{ $task->id }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="color: red; border: none; background: none; cursor: pointer; text-decoration: underline;">
                            Удалить
                        </button>
                    </form>
                @endcan
            </div>
        </div>
    @endforeach
    
    @if($tasks->isEmpty())
        <p>Задачи не найдены</p>
    @endif
</x-main-layout>