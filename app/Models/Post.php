<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    //Relación uno a muchos inversa
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    //Relación uno a muchos inversa
    public function categoria()
    {
        return $this->belongsTo('App\Models\Categoria');
    }

    //Relación uno a uno polimórfica
    public function image()
    {
        /* Como primer parámetro se pasa el modelo Image, como 
        segundo parámetro se pasa el nombre del método 
        especificado en el modelo Image  */
        return $this->morphOne('App\Models\Image', 'imageable');
    }

    //Relación uno a muchos polimórfica
    public function comments()
    {
        return $this->morphMany('App\Models\Comment', 'commentable');
    }

    //Relación muchos a muchos polimórfica
    public function tags()
    {
        return $this->morphToMany('App\Models\Tag', 'taggable');
    }
}
