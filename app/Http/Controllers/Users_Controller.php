<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;


class Users_Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;



    public function Display()
    {

        echo view('admin_panel/users/user', ['user' => Users::paginate(5)]);

    }

    public function DisplayDataById($users_id)
    {
        $user = Users::find($users_id);

        echo view('admin_panel/users/user_detail', compact('user'));
    }


    public function Delete($id)
    {
        $user = Users::find($id);

        $user->delete();

        return redirect()->route('users')->with('message', "Successfully Deleted!");

    }
}