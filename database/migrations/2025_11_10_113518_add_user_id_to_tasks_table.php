<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) 
        {
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
        
            $table->index('user_id');
        });

    }

    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) 
        {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};