<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;


class Invoice_Controller extends Controller
{
    public function index(Request $request)
    {
        // Default behavior: Load all invoices
        $orders = Order::with('orderItems.product')->orderBy('created_at', 'desc')->paginate(10);

        // Send available months for filtering dropdown
        $months = Order::selectRaw('MONTH(created_at) as month, YEAR(created_at) as year')
            ->groupBy('month', 'year')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get();

        return view('admin_panel.invoice.invoice', compact('orders', 'months'));
    }

    public function filter(Request $request)
    {
        $request->validate([
            'month' => 'required|integer|min:1|max:12',
            'year' => 'required|integer',
        ]);

        // Filter orders by month and year
        $orders = Order::with('orderItems.product')
            ->whereYear('created_at', $request->year)
            ->whereMonth('created_at', $request->month)
            ->orderBy('created_at', 'desc')
            ->paginate(10)
            ->appends(['month' => $request->month, 'year' => $request->year]);
        ;

        // Re-fetch available months
        $months = Order::selectRaw('MONTH(created_at) as month, YEAR(created_at) as year')
            ->groupBy('month', 'year')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get();

        return view('admin_panel.invoice.invoice', compact('orders', 'months'));
    }
}
