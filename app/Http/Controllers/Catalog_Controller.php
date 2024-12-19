<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\http\Request;



class Catalog_Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function Index(Request $request, $categorySlug = null)
    {
        $categorySelected = '';

        // Category and other filter initialization
        $category = Category::orderBy('name', 'ASC')->get();
        //$rarity = Rarity::orderBy('name', 'ASC')->get();
        //$type = Type::orderBy('name', 'ASC')->get();
        $products = Product::orderBy('product_id', 'DESC');
        $categoryList = Category::orderBy('name', 'ASC')->get();



        // Applying filters
        if (!empty($categorySlug)) {
            $category = Category::where('name', $categorySlug)->first();
            $products = $products->where('category_id', $category->category_id);
            $categorySelected = $category->category_id;
        }

        // Paginate the products
        $products = $products->paginate(8);

        // Return the data to the view
        $data['category'] = $category;
        $data['categorySelected'] = $categorySelected;
        $data['categoryList'] = $categoryList;
        //$data['type'] = $type;
        //$data['rarity'] = $rarity;
        $data['products'] = $products;

        return view('catalog_panel.catalog', $data);
    }



}