<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        $admin = auth()->user();
        $userCount = User::count();
        $categoryCount = Category::count();

        return view('admin.dashboard', compact(
            'admin', 'categoryCount', 'userCount'
        ));
    }
}
