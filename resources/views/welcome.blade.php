<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Добро пожаловать</title>
    </head>
    <body>
        <h1>Добро пожаловать, {{ $name ?? 'отсюда' }}</h1>

        <livewire:Counter count="5"/>
        <livewire:mirror-text text="Привет"/>
        <livewire:create-post/>

    </body>
</html>