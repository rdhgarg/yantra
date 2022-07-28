<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Passport\HasApiTokens;

class FrontUser extends Authenticatable
{

    protected $fillable = ['name','email','mobile','password','redemption_value','redemption_points'];

    use Notifiable;
    use HasRoles;
    use HasApiTokens;


     /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function user()
    {
        return $this->hasOne('App\FrontUser', 'id', 'id');
    }
}
