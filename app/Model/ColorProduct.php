<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ColorProduct extends Model 
{

    protected $table = 'color_product';
    public $timestamps = true;
    protected $fillable = array('product_id', 'color_id');

}