<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public $timestamps = false;
    
    protected $fillable = ['title', 'due', 'url', 'urgency_id'];
    
    protected $attributes = [
        'url' => '',
        'urgency_id' => 3
    ];
}