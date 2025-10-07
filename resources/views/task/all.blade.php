<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
    <h1>Все задачи</h1>
    
    @foreach ($tasks as $task)
        <div class="task">
            <div>ID: {{ $task->id }}</div>
            <div>Срок: {{ $task->due }}</div>
            <div><strong>Заголовок:</strong> {{ $task->title }} </div>
        </div>
    @endforeach
    </body>
</html>