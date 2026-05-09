<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'title', 
        'description', 
        'start_date', 
        'due_date', 
        'priority', 
        'status'
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'due_date' => 'datetime',
    ];
}