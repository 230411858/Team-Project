<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Basket;
use App\Models\BasketItem;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{
    //
    public function add()
    {
        if (Auth::check())
        {
            $basket_item = new BasketItem();

            $basket_item->basket = Auth::user()->basket;

            $basket_item->product = request('product');

            $basket_item->quantity = request('quantity');

            $basket_item->save();
        }
        else
        {
            redirect('login');
        }
    }
}
