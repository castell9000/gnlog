<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Socialuser extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'provider','socialid','token','email','name','jobs',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'socialid','token', 'remember_token',
    ];
}
