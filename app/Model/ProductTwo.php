<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductTwo extends Model
{
    protected $table = 'product_twos';
    public $timestamps = true;
    protected $fillable = array('name', 'description', 'price', 'offer', 'qty', 'image', 'category_id');

    public function category()
    {
        return $this->belongsTo('App\Model\Category');
    }

    public function productItems()
    {
        return $this->hasMany('App\Model\ProductItem', 'product_id', 'id');
    }
}
