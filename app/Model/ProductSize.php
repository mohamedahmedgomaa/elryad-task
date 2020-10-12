<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{

    protected $table = 'color_size';
    public $timestamps = true;
    protected $fillable = array('color_id', 'size_id');

}
