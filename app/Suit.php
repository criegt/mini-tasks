<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suit extends Model
{
    protected $fillable = [
        'title', 'description',
    ];
}
