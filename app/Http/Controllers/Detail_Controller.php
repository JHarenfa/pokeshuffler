<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Rarity;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class Detail_Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;



    public function Display()
    {
        echo view('detail_panel.detail', ['detail' => Product::all()]);
    }

    public function DisplayDataById($product_id)
    {
        $product = Product::find($product_id);
        // Fetch related category, rarity, and type names
        $category = Category::where('category_id', $product->category_id)->first();
        $rarity = Rarity::where('rarity_id', $product->rarity_id)->first();
        $type = Type::where('type_id', $product->type_id)->first();

        $data = [
            'product' => $product,
            'category' => $category ? $category->name : 'N/A',
            'rarity' => $rarity ? $rarity->name : 'N/A',
            'type' => $type ? $type->name : 'N/A',
        ];

        echo view('detail_panel.detail', $data);

    }

}