<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suit extends Model
{
    protected $fillable = [
        'title', 'description',
    ];

    public function tasks()
    {
        return $this->belongsToMany('App\Task', 'task_suit');
    }
}
