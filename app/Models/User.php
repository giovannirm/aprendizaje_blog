<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /* Servirá para recoger el registro del perfil con respecto al id
    de la tabla user 
    Relación uno a uno */
    public function profile()
    {
        /* De forma manual 
        first(): recupera el primer registro de una consulta*/
        // $profile = Profile::where('user_id', $this->id)->first();
        // return $profile;

        /* De forma rápida pero para esto se debe importar
        el modelo Profile -> use App\Models\Profile;*/
        // return $this->hasOne(Profile::class);

        /* De forma rápida
        hasOne: considera que la PK de users es id y 
        la FK de profiles es user_id, en caso de haber puesto
        tanto la FK como la PK de manera distinta a las convenciones
        entonces se le puede agregar al método 2 parámetros más indicando
        el nombre al que debe hacer referencia al momento de realizar la
        consulta, el 2do parámetro es la FK y el 3er es la PK*/
        /* return $this->hasOne('App\Models\Profile', 'foreing_key', 'local_key'); */
        return $this->hasOne('App\Models\Profile');        
    }

    //Relación uno a muchos
    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

    //Relación uno a muchos
    public function videos()
    {
        return $this->hasMany('App\Models\Video');
    }

    //Relación uno a muchos
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    //Relación muchos a muchos
    public function roles()
    {
        return $this->belongsToMany('App\Models\Role');
    }

    //Relación uno a uno polimórfica
    public function image()
    {
        /* Como primer parámetro se pasa el modelo Image, como 
        segundo parámetro se pasa el nombre del método 
        especificado en el modelo Image  */
        return $this->morphOne('App\Models\Image', 'imageable');
    }
}
