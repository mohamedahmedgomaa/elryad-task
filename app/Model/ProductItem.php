<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductItem extends Model
{
    protected $table = 'product_items';
    public $timestamps = true;
    protected $fillable = array('key', 'value', 'product_id');

    public function productTwo()
    {
        return $this->belongsTo('App\Model\ProductTwo', 'product_id', 'id');
    }
}
