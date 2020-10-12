<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductItem extends Model
{
    protected $table = 'product_items';
    public $timestamps = true;
    protected $fillable = array('key', 'value', 'product_id');

    public function product()
    {
        return $this->belongsTo('App\Model\Product', 'product_id', 'id');
    }
}
