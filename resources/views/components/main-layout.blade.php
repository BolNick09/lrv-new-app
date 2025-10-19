<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
</head>
<body>
    <nav style="padding: 1rem; background: #f0f0f0; margin-bottom: 2rem;">
        <a href="/tasks" style="margin-right: 1rem;">Все задачи</a>
    </nav>
    
    {{ $slot }}
</body>
</html>