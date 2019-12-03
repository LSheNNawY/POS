<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use \Dimsav\Translatable\Translatable;

    public $translatedAttributes = ['name', 'address'];

    protected $guarded = [];

    /**
     * client order relationship
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
