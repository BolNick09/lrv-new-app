<x-main-layout>
    <x-slot:title>Редактирование задачи </x-slot>
            <h1>Редактирование задачи</h1>
            <form action="/task/update" method="post">
                @csrf
                <input type = 'hidden' name = 'id' value="{{ $task->id }}" required />

                <div>Название задачи</div>
                <input type = 'text' name = 'title' value="{{ $task->title }}" required />

                <div>Срок</div>
                <div><input type = 'date' name = 'due' value="{{ $task->due }}" required /></div>

                <input type="submit" value="Сохранить">
            </form>
</x-main-layout>