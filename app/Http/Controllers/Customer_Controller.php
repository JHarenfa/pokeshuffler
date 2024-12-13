<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class Customer_Controller extends Controller
{
    public function Display()
    {
        $user = Auth::user(); // Get the logged-in user
        $orders = Order::where('user_id', $user->id)->with('items')->paginate(5); // Fetch orders with their items

        echo view('customer_panel.customer', compact('orders', 'user'));
    }
}
