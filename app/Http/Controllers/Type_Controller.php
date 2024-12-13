<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;


class Type_Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function Create(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Type::create([
            'name' => request()->get('name')
        ]);

        return redirect()->route('type')->with('message', "Successfully Added!");

    }

    public function Display()
    {

        echo view('admin_panel/type/type', ['type' => Type::paginate(5)]);

    }

    public function Edit($id)
    {
        $type = Type::find($id);

        echo view('admin_panel/type/edit_type', compact('type'));

    }

    public function Update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $type = Type::find($id);

        $type->update([
            'name' => request()->get('name')
        ]);

        return redirect()->route('type')->with('message', "Successfully Edited!");
    }

    public function Delete($id)
    {
        $type = Type::find($id)->findOrFail($id);

        $type->delete();

        return redirect()->route('type')->with('message', "Successfully Deleted!");

    }
}