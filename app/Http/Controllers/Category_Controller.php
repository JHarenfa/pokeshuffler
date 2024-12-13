<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;


class Category_Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function Create(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Category::create([
            'name' => request()->get('name')
        ]);

        return redirect()->route('category')->with('message', "Successfully Added!");

    }

    public function Display()
    {

        echo view('admin_panel/category/category', ['category' => Category::paginate(5)]);

    }

    public function Edit($id)
    {
        $category = Category::find($id);

        echo view('admin_panel/category/edit_category', compact('category'));

    }

    public function Update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $category = Category::find($id);

        $category->update([
            'name' => request()->get('name')
        ]);

        return redirect()->route('category')->with('message', "Successfully Edited!");
    }

    public function Delete($id)
    {
        $category = Category::find($id)->findOrFail($id);

        $category->delete();

        return redirect()->route('category')->with('message', "Successfully Deleted!");

    }
}