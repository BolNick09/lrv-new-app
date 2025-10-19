<x-main-layout>
    <x-slot:title>Задача {{ $task->id }}</x-slot>
        <div class="task-detail">
        <h1>{{ $task->title }}</h1>
        <div>ID: {{ $task->id }}</div>
        <div>Срок выполнения:</strong> {{ $task->due }}</div>
    </div>
</x-main-layout>