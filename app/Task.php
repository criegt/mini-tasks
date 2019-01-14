<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $fillable = [
        'title', 'content', 'task_state', 'suit_id',
    ];

    public $suit_ids;

    public function steps()
    {
        return $this->hasMany('App\Step');
    }

    public function suits()
    {
        return $this->belongsToMany('App\Suit', 'task_suit');
    }
}
