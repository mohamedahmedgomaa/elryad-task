<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model 
{

    protected $table = 'categories';
    public $timestamps = true;
    protected $fillable = array('name_ar', 'name_en', 'description_ar', 'description_en');

    public function products()
    {
        return $this->hasMany('App\Model\Product');
    }

}