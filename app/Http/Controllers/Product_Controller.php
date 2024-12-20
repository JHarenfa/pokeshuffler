<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Rarity;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\ProductService;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use function PHPSTORM_META\type;

class Product_Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index(Request $request)
    {
        // Get current page and perPage from the query string (defaults are 1 and 10)
        $page = $request->get('page', 1);
        $perPage = $request->get('perPage', 5);

        // Fetch paginated products from the ProductService
        $data = $this->productService->getAllProducts($page, $perPage);
        $products = $data['products'];
        $total = $data['total'];

        // Calculate pagination parameters
        $totalPages = ceil($total / $perPage);

        // Return view with products and pagination data
        return view('admin_panel/product/product', compact('products', 'page', 'perPage', 'total', 'totalPages'));
    }

    public function Add()
    {
        echo view('admin_panel/product/add_product', [
            'rarity' => Rarity::get(),
            'category' => Category::get(),
            'type' => Type::get()
        ]);
    }

    public function Create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'category' => 'required',
            'rarity' => 'nullable',
            'type' => 'nullable',
            'stock' => 'required',
            'price' => 'required',
            'image_url' => 'required|mimes:png,jpg,jpeg',
            'is_popular' => 'nullable',
        ]);

        $filename = null;
        $path = NULL;

        if ($request->has('image_url')) {
            $file = $request->file('image_url');
            $extension = $file->getClientOriginalExtension();

            // Generate a unique filename
            $filename = time() . '.' . $extension;

            // Define the upload path
            $path = 'product-image/';
            $filePath = $path . $filename;

            // Move the file to the specified path
            $file->move(public_path($path), $filename);
        }

        Product::create([
            'name' => request()->get('name'),
            'description' => request()->get('description'),
            'category_id' => request()->get('category'),
            'rarity_id' => request()->get('rarity'),
            'type_id' => request()->get('type'),
            'stock' => request()->get('stock'),
            'price' => request()->get('price'),
            'image_url' => $filePath,
            'is_popular' => request()->has('is_popular')
        ]);

        return redirect()->route('product')->with('message', "Successfully Added!");

    }

    public function Display()
    {

        echo view('admin_panel/product/product', [
            'products' => Product::paginate(5)
        ]);

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


        echo view('admin_panel/product/product_detail', $data);

    }

    public function Edit($product_id)
    {
        $product = Product::find($product_id);
        $category = Category::get();
        $rarity = Rarity::get();
        $type = Type::get();

        $data = [
            'product' => $product,
            'category' => $category,
            'rarity' => $rarity,
            'type' => $type,
        ];

        echo view('admin_panel/product/edit_product', $data);

    }

    public function Update(Request $request, $id, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'category' => 'required',
            'rarity' => 'nullable',
            'type' => 'nullable',
            'stock' => 'required',
            'price' => 'required',
            'image_url' => 'required|mimes:png,jpg,jpeg',
            'is_popular' => 'nullable',
        ]);

        $product = Product::find($id);


        $uploadPath = NULL;
        $filename = NULL;
        if ($request->has('image_url')) {
            $file = $request->file('image_url');
            $extension = $file->getClientOriginalExtension();

            $filename = time() . '.' . $extension;

            // Define the upload path
            $uploadPath = 'product-image/';
            $filePath = $uploadPath . $filename;

            // Move the file to the upload path
            $file->move(public_path($uploadPath), $filename);

            // Check and delete the old file if it exists
            if (!empty($product->image_url)) {
                $oldFileUrl = $product->image_url;


                $oldFilePath = public_path($oldFileUrl);
                if (File::exists($oldFilePath)) {
                    File::delete($oldFilePath);
                }
            }
        }

        $product->update(
            [
                'name' => request()->get('name'),
                'description' => request()->get('description'),
                'category_id' => request()->get('category'),
                'rarity_id' => request()->get('rarity'),
                'type_id' => request()->get('type'),
                'stock' => request()->get('stock'),
                'price' => request()->get('price'),
                'image_url' => $filePath,
                'is_popular' => request()->has('is_popular')
            ]
        );

        return redirect()->route('product')->with('message', "Successfully Edited!");
    }

    public function Delete($id)
    {
        $product = Product::find($id);

        // Check if the product has an associated image
        if (!empty($product->image_url)) {
            $filePath = public_path($product->image_url); // Convert the relative path to the full system path
            if (File::exists($filePath)) {
                File::delete($filePath); // Delete the file
            }
        }

        $product->delete();

        return redirect()->route('product')->with('message', "Successfully Deleted!");

    }
}