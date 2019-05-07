<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductTranslation extends Model
{
	public $timestamps = false;
	protected $fillable = ['name', 'description'];

	public function setNameAttribute($value) {
        $this->attributes['name'] = strtolower($value);
    }

    public function getNameAttribute($value) {
        return ucfirst($value);
    }
}
