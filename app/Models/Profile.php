<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    // Relación uno a uno inverso
    public function user()
    {        
        /* Forma manual
        $user = User::find($this->user_id);
        return $user; */
        // return $this->belongsTo('App\Models\User', 'foreing_key', 'local_key');
        return $this->belongsTo('App\Models\User');
    }
}
