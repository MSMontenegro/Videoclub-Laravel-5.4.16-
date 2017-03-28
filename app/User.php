<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Auth\Passwords\CanResetPassword;
//use Illuminate\Foundation\Auth\Access\Authorizable;
//use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
//use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Notifications\Notifiable as Notifiable;

class User extends Model implements
//implements AuthenticatableContract,
//                                    AuthorizableContract,
                                    CanResetPasswordContract
{
  //use Notifiable;
  use Authenticatable, CanResetPassword, Notifiable;
  //Authorizable, CanResetPassword, Notifiable;
  //SoftDeletes;
  protected $fillable = [
        'name', 'email', 'password',
    ];
  protected $hidden = [
        'password', 'remember_token',
  ];
  //protected $dates = ['deleted_at'];
}
