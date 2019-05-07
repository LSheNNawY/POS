<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use \Dimsav\Translatable\Translatable;

    public $translatedAttributes = ['name', 'description'];

    protected $guarded = [];

    protected $appends = ['image_path', 'profit'];


    public function category() {
        return $this->belongsTo(Category::class);
    }


    public function getImagePathAttribute() {
        return asset('uploads/products/' . $this->image);
    }

    /**
     * get profit percentage
     * @return float|int
     */
    public function getProfitAttribute() {
        $profit = $this->sale_price - $this->purchase_price;
        return round($profit * 100 / $this->purchase_price, 2);
    }
}
