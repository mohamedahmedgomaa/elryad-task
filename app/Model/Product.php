<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $table = 'products';
    public $timestamps = true;
    protected $fillable = array('name', 'description', 'price', 'offer', 'qty', 'image', 'category_id');

    public function category()
    {
        return $this->belongsTo('App\Model\Category');
    }

    public function colors()
    {
        return $this->belongsToMany('App\Model\Color');
    }

    public function sizes()
    {
        return $this->belongsToMany('App\Model\Size');
    }

}
