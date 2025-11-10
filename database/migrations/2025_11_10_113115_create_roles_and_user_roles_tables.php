<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) 
        {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('user_roles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('role_id')->constrained()->onDelete('cascade');
            $table->timestamps();
            
            // Уникальный индекс, чтобы у пользователя не было дублирующихся ролей
            $table->unique(['user_id', 'role_id']);
        });

        // Роли по умолчанию
        DB::table('roles')->insert([
            ['name' => 'участник'],
            ['name' => 'модератор'],
            ['name' => 'администратор'],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('user_roles');
        Schema::dropIfExists('roles');
    }
};
