<?php

namespace App\Http\Controllers;

use App\Models\Rarity;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;


class Rarity_Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function Create(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Rarity::create([
            'name' => request()->get('name')
        ]);

        return redirect()->route('rarity')->with('message', "Successfully Added!");

    }

    public function Display()
    {

        echo view('admin_panel/rarity/rarity', ['rarity' => Rarity::paginate(5)]);

    }

    public function Edit($id)
    {
        $rarity = Rarity::find($id);

        echo view('admin_panel/rarity/edit_rarity', compact('rarity'));

    }

    public function Update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $rarity = Rarity::find($id);

        $rarity->update([
            'name' => request()->get('name')
        ]);

        return redirect()->route('rarity')->with('message', "Successfully Edited!");
    }

    public function Delete($id)
    {
        $rarity = Rarity::find($id)->findOrFail($id);

        $rarity->delete();

        return redirect()->route('rarity')->with('message', "Successfully Deleted!");

    }
}