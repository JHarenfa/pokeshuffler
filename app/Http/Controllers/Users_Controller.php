<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


class Users_Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;



    public function Display()
    {

        echo view('admin_panel/users/user', ['user' => Users::paginate(5)]);

    }


    public function Delete($id)
    {
        $user = Users::find($id);

        $user->delete();

        return redirect()->route('users')->with('message', "Successfully Deleted!");

    }
}