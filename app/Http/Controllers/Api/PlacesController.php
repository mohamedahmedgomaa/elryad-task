<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\User;
use App\VerificationCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class PlacesController extends Controller
{




    public  function  getCategories(){
        $categories = Category::with('category_langs')->get();
        return responseJson(200, 'Success', $categories);
    }




    


}
