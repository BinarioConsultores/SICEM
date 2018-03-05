<?php

namespace sicem;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','dni','tipo','estado',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function Contratosregistrados()
    {
      return $this->hasMany('sicem\Contrato','usu_id_reg','id');
    }
    public function Contratosautorizados()
    {
      return $this->hasMany('sicem\Contrato','usu_id_auto','id');
    }
}
