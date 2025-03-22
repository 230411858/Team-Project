<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user', Auth::id());

        return view('orders.index', ['orders' => $orders]);
    }

    public function show($id)
    {
        if (Order::find($id) != null && (Auth::user()->account_type == 'admin' || Auth::id() == Order::find($id)->user))
        {
            return view('orders.show', ['order' => Order::find($id)]);
        }
        else
        {
            abort(403);
        }
    }
}
