<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Задача {{ $task->id }}</title>
</head>
<body>    
    <div class="task-detail">
        <h1>{{ $task->title }}</h1>
        <div>ID: {{ $task->id }}</div>
        <div>Срок выполнения:</strong> {{ $task->due }}</div>
    </div>
</body>
</html>