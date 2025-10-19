<form action="{{ $action }}" method="post">
    @csrf
    
    @if(isset($task) && $task->id)
        <input type='hidden' name='id' value="{{ $task->id }}" />
    @endif

    <div>Название задачи</div>
    <input type='text' name='title' value="{{ $task->title ?? '' }}" required />

    <div>Срок</div>
    <div><input type='date' name='due' value="{{ $task->due ?? '' }}" required /></div>

    <input type="submit" value="{{ $submitText ?? 'Сохранить' }}">
</form>