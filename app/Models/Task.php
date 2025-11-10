<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public $timestamps = false;
    
    protected $guarded = [];
    
    
    // protected $fillable = ['title', 'due', 'url', 'urgency_id']; равносильно ^   

    protected $attributes = [
        'url' => '',
        'urgency_id' => 3
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}