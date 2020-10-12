<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{

    protected $table = 'colors';
    public $timestamps = true;
    protected $fillable = array('name_ar', 'name_en');

    public function products()
    {
        return $this->belongsToMany('App\Model\Product');
    }

}
