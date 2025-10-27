<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UrgencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $urgencies = 
        [
            ['id' => 1, 'name' => 'Срочно', 'color' => 'red'],
            ['id' => 2, 'name' => 'Средне', 'color' => 'yellow'],
            ['id' => 3, 'name' => 'Не важно', 'color' => 'green']
        ];
        DB::table ('urgencies')->insert ($urgencies);
    }
}
