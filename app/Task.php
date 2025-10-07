<?php

namespace App;

class Task
{
    public function __construct(
        public int $id,
        public string $due,
        public string $title
    ) {}


    public static function all(): array
    {
        return [
            new self(1, '2025-10-06', 'Отметить конец дня'),
            new self(2, '2025-10-07', 'Сделать домашку'),
            new self(3, '2025-10-08', 'Сходить в магазин'),
        ];
    }


    public static function find(int $id): ?Task
    {
        foreach (self::all() as $task) 
        {
            if ($task->id === $id) 
                return $task;
            
        }
        return null;
    }
}