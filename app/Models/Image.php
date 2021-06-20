<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Image extends Model
{
    protected $guarded = [];
    
    use HasFactory;

    /* Relación uno a uno inversa polimórfica
    El nombre del método debe coincidir con los campos señalados
    en la BD */
    public function imageable()
    {
        /* morphTo: con esto indicamos que vamos a usar la tabla
        images para realizar una relación polimórfica */
        return $this->morphTo();
    }
}
