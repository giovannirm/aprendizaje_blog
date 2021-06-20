<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    //Relación uno a muchos inversa
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    //Relación uno a muchos polimórfica
    public function comments()
    {
        return $this->morphMany('App\Models\Comment', 'commentable');
    }

    //Relación muchos a muchos polimórfica
    public function posts()
    {
        return $this->morphToMany('App\Models\Tag', 'taggable');
    }
}
