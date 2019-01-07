<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $fillable = [
        'title', 'content', 'task_state', 'suit_id',
    ];
}
