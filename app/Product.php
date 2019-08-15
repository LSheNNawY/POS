<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use \Dimsav\Translatable\Translatable;

    public $translatedAttributes = ['name', 'description'];

    protected $guarded = [];

    protected $appends = ['image_path', 'profit', 'profit_percent'];

    /**
     * category relation
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category() {
        return $this->belongsTo(Category::class);
    }

    /**
     * product order relationship
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function orders() {
        return $this->belongsToMany(Order::class,'product_order');
    }

    public function getImagePathAttribute() {
        return asset('uploads/products/' . $this->image);
    }

    /**
     * get profit
     * @return float|int
     */
    public function getProfitAttribute() {
       return $this->sale_price - $this->purchase_price;
    }


    /**
     * get profit percentage
     * @return float|int
     */
    public function getProfitPercentAttribute() {
        $profit = $this->sale_price - $this->purchase_price;
        return round($profit * 100 / $this->purchase_price, 2);
    }
}
