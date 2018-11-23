<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    proteted $fillable = [
      'name','sobrenome','email','username','data_de_nascimento','telefone',
      'cpf','sexo'
    ];
    protected $primaryKey = "usuario_id";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
      public $timestamps = false;

      public function setPasswordAttribute($password){
        $this->attributes['password'] = \Hash::make($password);
      }
}
