<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use \Dimsav\Translatable\Translatable;

    public $translatedAttributes = ['name', 'address'];

    protected $guarded = [];

    protected $casts = [
        'phone' => 'array'
    ];
}
