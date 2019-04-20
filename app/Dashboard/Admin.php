<?php

namespace App\Dashboard;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $guard = 'admin';

    /**
     * attributes that should filled
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password'
    ];

    /**
     * attributes that should be hidden
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token'
    ];
}
