<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    //Relación muchos a muchos inversa polimórfica
    public function posts()
    {
        return $this->morphedByMany('App\Models\Post', 'taggable');
    }

    //Relación muchos a muchos inversa polimórfica
    public function videos()
    {
        return $this->morphedByMany('App\Models\Video', 'taggable');
    }
}
