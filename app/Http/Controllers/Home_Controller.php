<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class Home_Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;



    public function Display()
    {
        $user = Auth::user();
        $home = Product::inRandomOrder()->take(4)->get();
        $category = Category::get();


        echo view('home_panel.home', compact('home', 'user', 'category'));
    }

}