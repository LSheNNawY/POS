<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientTranslation extends Model
{
	public $timestamps = false;
	protected $fillable = ['name', 'address'];

	public function setNameAttribute($value) {
        $this->attributes['name'] = strtolower($value);
    }

    public function getNameAttribute($value) {
        return ucfirst($value);
    }
}
