<?php

namespace App;

class Task
{
    public function __construct(
        public int $id,
        public string $due,
        public string $title
    ) {}

    private static $tasks = [];
    public static function staticConstruct(): void
    {
        self::$tasks = [
            new self(1, '2025-10-06', 'Отметить конец дня'),
            new self(2, '2025-10-07', 'Сделать домашку'),
            new self(3, '2025-10-08', 'Сходить в магазин'),
        ];
    }
    public static function getAll() : array
    {
        return self::$tasks;
    }

    public static function find(int $id): ?Task
    {
        foreach (self::$tasks as $task) 
        {
            if ($task->id === $id) 
                return $task;
            
        }
        return null;
    }
}

Task::staticConstruct();