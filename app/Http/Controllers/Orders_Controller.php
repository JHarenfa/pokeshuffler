<?php

namespace App\Http\Controllers;

use App\Models\CustomerAddress;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class Orders_Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    public function Display()
    {
        echo view('admin_panel/orders/orders', ['orders' => Order::paginate(5)]);
    }

    public function OrderItems()
    {
        echo view('admin_panel/order_items/order_item', ['orders' => OrderItem::paginate(5)]);
    }


    public function CustomerAddress()
    {
        echo view('admin_panel/customer_addresses/customer_address', ['customers' => CustomerAddress::paginate(5)]);
    }
}