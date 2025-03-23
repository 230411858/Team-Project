<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;

class ReportController extends Controller
{
    public function index()
    {
        $recentOrders = Order::with('customer')->latest()->take(20)->get();//takes last 20 orders
        return view('admin.reports', compact('recentOrders'));
    }
}
