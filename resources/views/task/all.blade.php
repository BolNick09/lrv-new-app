<x-main-layout>
    <x-slot:title>Все задачи </x-slot>
        @foreach ($tasks as $task)
        <div class="task">
            <div>ID: {{ $task->id }}</div>
            <div>Срок: {{ $task->due }}</div>
            <div><strong>Заголовок:</strong> {{ $task->title }} </div>
        </div>
    @endforeach
</x-main-layout>